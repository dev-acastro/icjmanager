<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Grupo;
use App\Sector;

class GrupoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_grupo' => $this->faker->word,
            'lider' => $this->faker->word,
            'telefono' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'sector_id' => Sector::factory(),
        ];
    }
}
