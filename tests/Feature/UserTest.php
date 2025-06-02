<?php

    namespace Tests\Feature;

    use App\Models\User;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;
    use Illuminate\Support\Str;

    class UserTest extends TestCase
    {
        use RefreshDatabase;

        public function test_cadastrar_usuario()
        {
            
            // Desativa o middleware que verifica se o usuário está ativo, para não interferir no teste (ele poderia bloquear o acesso)
            $this->withoutMiddleware(\App\Http\Middleware\VerificaStatusAtivo::class);

            // Cria um usuário no banco de dados usando a factory do User
            $user = User::factory()->create();

            // Simula que esse usuário está autenticado no sistema
            $this->actingAs($user);

            // Define os dados que serão enviados na requisição para criar um novo usuário
            $dados = [
                'name' => 'teste_laravel',
                'email' => 'teste_laravel@unifapec.com.br',
                'matricula' => '9999',
                'status' => 'ativo',
                'password' => 'teste_laravel', // geralmente a senha deveria ser hasheada na controller
                'email_verified_at' => now(), // define como verificado na data/hora atual
                'remember_token' => Str::random(10), // gera um token aleatório
            ];

            // Faz uma requisição POST para a rota /usuarios simulando o formulário de cadastro
            // O from('/usuarios') serve para simular que o formulário foi enviado da página /usuarios
            $response = $this->from('/usuarios')->post('/usuarios', $dados);

            // Valida que a resposta foi um redirect para /usuarios após criar o usuário
            $response->assertRedirect('/usuarios');

            // Exibe no terminal todos os usuários cadastrados no banco após o teste
            dump(User::all());

            // Verifica se existe um usuário com a matrícula '9999' no banco de dados
            $this->assertDatabaseHas('users', [
                'matricula' => '9999',
            ]);
        }
    }
?>