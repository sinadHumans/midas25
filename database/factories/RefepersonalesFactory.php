<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Refepersonales;

class RefepersonalesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Refepersonales::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tiempoConocerlo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'relacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'domicilio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tel1' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'opinion' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
