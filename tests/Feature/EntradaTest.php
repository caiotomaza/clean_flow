<?php

    namespace Tests\Feature;

    use App\Models\User;
    use App\Models\ResiduosChe;
    use App\Models\Filial;
    use App\Models\Veiculo;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;
    use Illuminate\Support\Str;

    class EntradaTest extends TestCase{

        use RefreshDatabase;

        public function test_entrada()
        {
            // Desabilita o middleware VerificaStatusAtivo durante a execução do teste
            // Isso garante que o middleware não bloqueie o acesso às rotas durante o teste.
            $this->withoutMiddleware(\App\Http\Middleware\VerificaStatusAtivo::class);

            // Cria um usuário fictício com ID 1 no banco de dados (banco de testes)
            $user = User::factory()->create([
                'id' => 1,
            ]);

            // Simula que o usuário está autenticado durante o teste
            $this->actingAs($user);

            // Cria uma filial fictícia com id_fil = 1
            $filial = Filial::factory()->create([
                'id_fil' => 1,
            ]);

            // Cria um veículo fictício com id_vec = 1
            $veiculo = Veiculo::factory()->create([
                'id_vec' => 1,
            ]);

            // Dados que serão enviados na requisição POST para a rota de armazenar resíduos
            $dados = [
                'id_filial' => 1,             // ID da filial associada
                'id_vec' => 1,                // ID do veículo que trouxe o resíduo
                'peso' => '9999',             // Peso do resíduo (em string, mas poderia ser float)
                'data_hora' => now()->format('Y-m-d H:i:s'), // Data e hora atuais no formato padrão
                'id_resd' => null,            // Material (opcional nesse teste)
                'id_sub_resd' => null,        // Submaterial (opcional nesse teste)
                'id_responsavel' => null,     // Responsável (não informado no teste)
                'tipo_registro' => 'entrada', // Tipo de registro (entrada ou saída)
            ];

            // Envia uma requisição POST para a rota /residuos/store com os dados acima
            $response = $this->post('/residuos/store', $dados);

            // Verifica se a resposta foi um redirecionamento HTTP 302
            // Isso geralmente indica que o registro foi salvo e o usuário foi redirecionado
            $response->assertStatus(302);

            // Mostra no terminal (no output do teste) todos os registros da tabela residuos_ches
            // Isso ajuda na inspeção durante o desenvolvimento do teste
            dump(ResiduosChe::all());

            /*
            // Verificar se o registro foi realmente criado no banco
            $this->assertDatabaseHas('residuos_ches', [
                'id_filial' => 1,
            ]);
            */
        }
    }
?>