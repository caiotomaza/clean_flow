<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use App\Models\ResiduosChe;
use App\Models\ResiduosSai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsultaMobileController extends Controller
{
    /**
     * Retorna a lista de registros de entrada formatada para o App Mobile.
     */
    public function getEntradas()
    {
        try {
            // Carrega as entradas com os relacionamentos 'residuo' e 'veiculo'
            // O relacionamento 'veiculo' precisa ser definido no Model ResiduosChe
            $entradas = ResiduosChe::with(['residuo', 'veiculo'])
                ->orderBy('data_hora', 'desc') // Ordena pelas mais recentes
                ->get();

            // Formata os dados para corresponder ao que o app Android espera (ConsultaEntrada.kt)
            $formattedData = $entradas->map(function ($item) {
                return [
                    'id' => $item->id_entrada,
                    'placa_veiculo' => $item->veiculo->placa ?? 'N/A', // Acessa a placa do veículo relacionado
                    'material_nome' => $item->residuo->nome ?? 'Material Desconhecido', // Acessa o nome do resíduo
                    'peso_inicial' => $item->peso . ' kg',
                    'data_hora_entrada' => date('d/m/Y H:i', strtotime($item->data_hora)),
                ];
            });

            return response()->json($formattedData);

        } catch (\Exception $e) {
            Log::error('Erro ao buscar entradas para mobile: ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno no servidor.'], 500);
        }
    }

    /**
     * Retorna a lista de registros de saída formatada para o App Mobile.
     */
    public function getSaidas()
    {
        try {
            // Carrega as saídas com os relacionamentos 'armazenamento' e 'veiculo'
            $saidas = ResiduosSai::with(['armazenamento', 'veiculo'])
                ->orderBy('data_hora', 'desc')
                ->get();

            // Formata os dados para corresponder ao que o app Android espera (ConsultaSaida.kt)
            $formattedData = $saidas->map(function ($item) {
                return [
                    'id_saida' => $item->id_saida,
                    'placa_veiculo' => $item->veiculo->placa ?? 'N/A',
                    'container_origem' => $item->armazenamento->container ?? 'Origem Desconhecida',
                    'data_hora_saida' => date('d/m/Y H:i', strtotime($item->data_hora)),
                ];
            });

            return response()->json($formattedData);

        } catch (\Exception $e) {
            Log::error('Erro ao buscar saídas para mobile: ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno no servidor.'], 500);
        }
    }

    /**
     * Retorna a lista de itens em armazenamento formatada para o App Mobile.
     */
    public function getArmazenamentos()
    {
        try {
            // Carrega os itens em armazenamento com o relacionamento 'residuo'
            $armazenamentos = Armazenamento::with(['residuo'])
                ->where('peso', '>', 0) // Exemplo: Apenas itens com peso
                ->orderBy('data_hora', 'desc')
                ->get();
                
            // Formata os dados para o app (ConsultaArmazenamento.kt)
            $formattedData = $armazenamentos->map(function ($item) {
                return [
                    'id_arm' => $item->id_arm,
                    'container_nome' => $item->container,
                    'material_nome' => $item->residuo->nome ?? 'Material Desconhecido',
                    'peso_atual' => $item->peso . ' kg',
                    'data_ultima_movimentacao' => date('d/m/Y H:i', strtotime($item->data_hora)),
                ];
            });

            return response()->json($formattedData);

        } catch (\Exception $e) {
            Log::error('Erro ao buscar armazenamentos para mobile: ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno no servidor.'], 500);
        }
    }
}