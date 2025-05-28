<?php
    namespace Tests\Feature;

    use App\Models\User;
    use App\Models\ResiduosChe;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;
    use Illuminate\Support\Str;

    class EntradaTest extends TestCase{
        use RefreshDatabase;

        public function test_entrada(){
            $this->withoutMiddleware(\App\Http\Middleware\VerificaStatusAtivo::class);

            $user = User::factory()->create();

            $this->actingAs($user);

            $dados = [
                'id_filial' => 1,
                'id_vec' => 1,
                'peso' => 100, // peso válido numérico
                'data_hora' => now()->format('Y-m-d H:i:s'), // data válida
                'id_resd' => 1,
                'id_sub_resd' => 1,
                'id_responsavel' => 1,
                'tipo_registro' => 'entrada', // valor correto conforme seu Enum ou validação
            ];

            $response = $this->from('/residuos/store')->post('/residuos/store', $dados);

            $response->assertRedirect('/registros');

            dump(ResiduosChe::all());

            $this->assertDatabaseHas('reseduos_ches', [
                'id_vec' => '1',
            ]);
        }
    }
?>