<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\ResiduosChe; // Importe o seu modelo ResiduosChe
    use Illuminate\Support\Facades\Validator; // Importe o Validator para validação de dados

    class EntradaMobileController extends Controller
    {
        /**
         * Armazena um novo registro de entrada de resíduos.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function store(Request $request)
        {
            // 1. Validação dos dados
            // Use as mesmas regras de validação que você teria no seu formulário web
            // e certifique-se de que os nomes dos campos batem com o que o Android vai enviar.
            $validator = Validator::make($request->all(), [
                'tipo_registro'      => 'required|string|in:entrada,saida,armazenamento', // Ajuste conforme seus tipos
                'id_filial_input'    => 'required|integer|exists:filiais,id_fil', // Garanta que a filial exista
                'placa_veiculo'      => 'nullable|string|max:10', // Placa pode ser opcional ou ter validação específica
                'peso_inicial'       => 'required|numeric|min:0', // Valida como número (decimal)
                'material'           => 'required|integer|exists:residuos,id_resd', // ID do tipo de resíduo
                'subtitulo_material' => 'nullable|integer|exists:sub_residuos,id_sub_resd', // ID do subtipo, opcional
                'id_responsavel'     => 'required|integer|exists:users,id', // ID do usuário responsável
                'id_container'       => 'nullable|string|max:255', // ID do armazenamento, opcional
                'data_armazenamento' => 'required|date_format:Y-m-d\TH:i:s', // Formato ISO 8601 (YYYY-MM-DDTHH:MM:SS)
            ], [
                // Mensagens de erro personalizadas (opcional)
                'required' => 'O campo :attribute é obrigatório.',
                'integer' => 'O campo :attribute deve ser um número inteiro.',
                'exists' => 'O :attribute selecionado não é válido.',
                'numeric' => 'O campo :attribute deve ser um número.',
                'min' => 'O :attribute deve ser no mínimo :min.',
                'date_format' => 'O campo :attribute deve estar no formato AAAA-MM-DDTHH:MM:SS.',
                'in' => 'O valor do campo :attribute é inválido.'
            ]);

            // Se a validação falhar, retorne os erros
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Erro de validação.',
                    'errors' => $validator->errors() // Retorna os erros detalhados
                ], 422); // Código 422 Unprocessable Entity para erros de validação
            }

            try {
                // 2. Criar um novo registro no banco de dados usando o seu modelo
                $residuo = ResiduosChe::create([
                    // Mapeie os nomes dos campos da requisição para os nomes das colunas da sua tabela
                    'id_filial'      => $request->input('id_filial_input'),
                    'id_vec'         => $request->input('placa_veiculo'), // Usando 'placa_veiculo' do front
                    'peso'           => $request->input('peso_inicial'),  // Usando 'peso_inicial' do front
                    'data_hora'      => $request->input('data_armazenamento'),
                    'id_resd'        => $request->input('material'),      // Usando 'material' do front
                    'id_sub_resd'    => $request->input('subtitulo_material'),
                    'id_responsavel' => $request->input('id_responsavel'),
                    'tipo_registro'  => $request->input('tipo_registro'),
                    // 'id_container' não está no $fillable do seu modelo, mas está no formulário.
                    // Se você tiver uma coluna 'id_container' na tabela 'residuos_ches', adicione-a ao $fillable
                    // e mapeie-a aqui: 'id_container' => $request->input('id_container'),
                ]);

                // 3. Retornar uma resposta de sucesso
                return response()->json([
                    'status' => 'success',
                    'message' => 'Registro de entrada de resíduo salvo com sucesso!',
                    'data' => $residuo // Opcional: retornar os dados do registro criado
                ], 201); // Código 201 Created para sucesso na criação de um recurso

            } catch (\Exception $e) {
                // 4. Capturar e retornar erros internos do servidor
                return response()->json([
                    'status' => 'error',
                    'message' => 'Ocorreu um erro ao tentar salvar o registro.',
                    'error_details' => $e->getMessage() // Útil para depuração (remover em produção)
                ], 500); // Código 500 Internal Server Error
            }
        }
    }

?>