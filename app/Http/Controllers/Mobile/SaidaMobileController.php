<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResiduosSai; // Modelo correto para Saída
use Illuminate\Support\Facades\Validator;

class SaidaMobileController extends Controller
{
    /**
     * Armazena um novo registro de SAÍDA de resíduos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // 1. Validação dos dados para o formulário de SAÍDA
        // Os nomes dos campos devem bater com o que o Android envia na classe 'RegistroSaidaRequest'
        $validator = Validator::make($request->all(), [
            'id_filial_sai'  => 'required|integer|exists:filiais,id_fil',
            'id_arm'         => 'required|integer|exists:armazenamentos,id_arm',
            'placa_veiculo'  => 'required|string|exists:veiculos,placa', // Valida se a placa existe na tabela de veículos
            'data_hora'      => 'required|date_format:Y-m-d H:i:s', // Formato enviado pelo Android (sem o 'T')
        ], [
            // Mensagens de erro personalizadas
            'required'    => 'O campo :attribute é obrigatório.',
            'integer'     => 'O campo :attribute deve ser um número inteiro.',
            'exists'      => 'O :attribute selecionado não é válido.',
            'unique'      => 'O :attribute informado já existe.',
            'date_format' => 'O campo :attribute deve estar no formato AAAA-MM-DD HH:MM:SS.',
        ]);

        // Se a validação falhar, retorne os erros
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro de validação.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // 2. Criar um novo registro no banco de dados
            $residuoSaida = ResiduosSai::create([
                // Mapeie os nomes dos campos da requisição para as colunas da tabela 'residuos_sais'
                'id_saida'  => $request->input('id_saida'),
                'id_filial' => $request->input('id_filial_sai'),
                'id_arm'    => $request->input('id_arm'),
                'id_vec'    => $request->input('placa_veiculo'), // A coluna id_vec recebe a placa
                'data_hora' => $request->input('data_hora'),
            ]);

            // 3. Retornar uma resposta de sucesso
            return response()->json([
                'status' => 'success',
                'message' => 'Registro de SAÍDA de resíduo salvo com sucesso!', // MENSAGEM CORRIGIDA
                'data' => $residuoSaida
            ], 201);

        } catch (\Exception $e) {
            // 4. Capturar e retornar erros internos do servidor
            return response()->json([
                'status' => 'error',
                'message' => 'Ocorreu um erro interno ao tentar salvar o registro.',
                'error_details' => $e->getMessage() // Útil para depuração (remover em produção)
            ], 500);
        }
    }
}