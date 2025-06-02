<?php

    namespace Tests\Feature;

    use App\Models\User;
    use App\Models\Armazenamento;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;
    use Illuminate\Support\Str;

    class ArmazenamentoTest extends TestCase{

        use RefreshDatabase;

        public function test_armazenamento()
        {
            // Desativa o middleware VerificaStatusAtivo para não interferir no teste.
            $this->withoutMiddleware(\App\Http\Middleware\VerificaStatusAtivo::class);

            // Cria um usuário fictício na base de dados com ID 1
            // Esse usuário é usado para simular autenticação.
            $user = User::factory()->create([
                'id' => 1,
            ]);

            // Simula que o usuário está autenticado no sistema
            $this->actingAs($user);

            // Dados que serão enviados na requisição POST para criar um armazenamento
            $dados = [
                'container' => 'Container-225yg', // nome do container
                'peso' => '145.25',                // peso associado ao armazenamento
                'data_hora' => now()->format('Y-m-d H:i:s'), // data e hora atuais, formatadas
                'material' => null,                // campo opcional, sem material especificado
                'subtitulo_material' => null,      // campo opcional também vazio
                'tipo_registro' => 'entrada',      // indica que é uma entrada no armazenamento
            ];

            // Envia uma requisição POST para a rota /armazenamentos com os dados definidos
            $response = $this->post('/armazenamentos', $dados);

            // Verifica se a resposta da requisição foi um redirecionamento (HTTP 302)
            // Isso indica que o backend processou a criação e redirecionou o usuário (geralmente para uma página de sucesso ou lista)
            $response->assertStatus(302);

            // Mostra no terminal todos os registros da tabela armazenamentos após o teste
            dump(Armazenamento::all());

            /*
            // Verificar se o registro foi realmente criado no banco
            $this->assertDatabaseHas('armazenamentos', [
                'container' => 'Container-225yg',
            ]);
            */
        }
    }
?>