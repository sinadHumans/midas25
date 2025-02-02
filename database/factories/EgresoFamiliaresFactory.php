<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Egresofamiliares;

class EgresofamiliaresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Egresofamiliares::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ahorro' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'alimentacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'transporte' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'seguros' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'luz' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tv' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'gas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'celular' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'agua' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'total' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentarios' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
