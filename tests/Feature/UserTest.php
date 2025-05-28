<?php
    namespace Tests\Feature;

    use App\Models\User;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;
    use Illuminate\Support\Str;

    class UserTest extends TestCase{
        use RefreshDatabase;

        public function test_cadastrar_usuario(){
            $this->withoutMiddleware(\App\Http\Middleware\VerificaStatusAtivo::class);

            $user = User::factory()->create();

            $this->actingAs($user);

            $dados = [
                'name' => 'teste_laravel',
                'email' => 'teste_laravel@unifapec.com.br',
                'matricula' => '9999',
                'status' => 'ativo',
                'password' => 'teste_laravel',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10), // gera token aleatório
            ];

            $response = $this->from('/usuarios')->post('/usuarios', $dados);

            $response->assertRedirect('/usuarios');

            dump(User::all());

            $this->assertDatabaseHas('users', [
                'matricula' => '9999',
            ]);
        }
    }
?>