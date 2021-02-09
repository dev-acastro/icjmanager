<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Distrito;
use App\Zona;

class DistritoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Distrito::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_distrito' => $this->faker->word,
            'supervisor' => $this->faker->word,
            'telefono' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'zona_id' => Zona::factory(),
        ];
    }
}
