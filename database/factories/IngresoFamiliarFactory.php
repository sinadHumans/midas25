<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ingresofamiliar;

class IngresofamiliarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingresofamiliar::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'quien' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fuente' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'monto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'total' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentarios' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
