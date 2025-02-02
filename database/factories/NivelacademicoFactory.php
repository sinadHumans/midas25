<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Nivelacademico;

class NivelacademicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nivelacademico::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ultimo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'periodo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'profesional' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cedula' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'especialidad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'caso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'otros' => $this->faker->text(),
        ];
    }
}
