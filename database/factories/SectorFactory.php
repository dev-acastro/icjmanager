<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Area;
use App\Sector;

class SectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_sector' => $this->faker->word,
            'supervisor' => $this->faker->word,
            'telefono' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'area_id' => Area::factory(),
        ];
    }
}
