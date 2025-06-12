<?php
namespace Database\Factories;

use App\Models\Residuos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResiduoFactory extends Factory
{
    protected $model = Residuos::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->word(),
        ];
    }
}
