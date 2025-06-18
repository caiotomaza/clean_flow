<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResiduosChe;
use App\Models\Veiculo; // Importe o model Veiculo
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EntradaMobileController extends Controller
{
    /**
     * Armazena um novo registro de entrada de resíduos vindo do app mobile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // 1. Validar os dados recebidos (usando os nomes enviados pelo Android)
        $validator = Validator::make($request->all(), [
            'idFilial' => 'required|integer|exists:filiais,id_fil',
            'placaVeiculo' => 'nullable|string|exists:veiculos,placa',
            'pesoInicial' => 'required|string', // A validação de string é mais flexível
            'idMaterial' => 'required|integer|exists:residuos,id_resd',
            'idSubtituloMaterial' => 'nullable|integer|exists:sub_residuos,id_sub_resd',
            'idResponsavel' => 'required|integer|exists:users,id',
            'idContainer' => 'nullable|string',
            'dataArmazenamento' => 'required|date_format:Y-m-d H:i:s', // Formato enviado pelo Android
        ]);

        // Se a validação falhar, retorna um erro JSON que o app entende
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dados inválidos fornecidos.',
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }
        
        try {
            // 2. CORREÇÃO: Encontrar o ID do veículo a partir da placa
            $veiculo = null;
            if ($request->filled('placaVeiculo')) {
                $veiculo = Veiculo::where('placa', $request->placaVeiculo)->first();
            }

            // 3. Criar o registro no banco de dados com os dados corretos
            ResiduosChe::create([
                'id_filial' => $request->idFilial,
                'id_vec' => $veiculo ? $veiculo->id_vec : null, // Salva o ID do veículo, não a placa
                'peso' => $request->pesoInicial,
                'data_hora' => $request->dataArmazenamento,
                'id_resd' => $request->idMaterial,
                'id_sub_resd' => $request->idSubtituloMaterial,
                'id_responsavel' => $request->idResponsavel,
                'tipo_registro' => 'entrada', // Valor fixo
            ]);

            // 4. Retornar uma resposta de sucesso em JSON
            return response()->json([
                'status' => 'success',
                'message' => 'Entrada registrada com sucesso!'
            ], 201); // 201 Created

        } catch (\Exception $e) {
            // Se qualquer outro erro ocorrer, loga e retorna um erro 500 em JSON
            Log::error('Erro ao registrar entrada via mobile: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Ocorreu um erro interno no servidor ao processar o registro.'
            ], 500);
        }
    }
}