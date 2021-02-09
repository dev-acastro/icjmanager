<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Usuario;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_usuarios' => $this->faker->word,
            'cargo' => $this->faker->word,
            'rol' => $this->faker->word,
            'nombre' => $this->faker->word,
            'correo' => $this->faker->word,
            'password' => $this->faker->password,
        ];
    }
}
