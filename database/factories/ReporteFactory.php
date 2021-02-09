<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Grupo;
use App\Reporte;

class ReporteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reporte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grupo_id' => Grupo::factory(),
            'codigo_grupo' => $this->faker->word,
            'asistencia_adultos' => $this->faker->word,
            'invitados_inconversos' => $this->faker->word,
            'conversiones' => $this->faker->word,
            'integrados_ccdl' => $this->faker->word,
            'integrados_biblico' => $this->faker->word,
            'fecha' => $this->faker->date(),
        ];
    }
}
