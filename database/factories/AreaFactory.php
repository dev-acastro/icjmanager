<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Area;
use App\Distrito;

class AreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Area::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_area' => $this->faker->word,
            'supervisor' => $this->faker->word,
            'telefono' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'distrito_id' => Distrito::factory(),
        ];
    }
}
