<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Creditos;

class CreditosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Creditos::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'entidad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'monto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'total' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estatus' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentario' => $this->faker->text(),
            'endeudamiento' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'hipoteca' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'score' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
