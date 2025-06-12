<?php

namespace Database\Factories;

use App\Models\Residuos;
use App\Models\SubResiduos;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubResiduoFactory extends Factory
{
    protected $model = SubResiduos::class;

    public function definition()
    {
        return [
            'id_sub_resd' => $this->faker->unique()->numberBetween(1000, 9999),
            'id_resd' => Residuos::inRandomOrder()->first()?->id_resd,
            'nome' => $this->faker->word(),
        ];
    }
}
