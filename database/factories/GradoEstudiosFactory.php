<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\GradoEstudios;

class GradoEstudiosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GradoEstudios::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'grado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'lugar' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'periodo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'documento' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'folio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
