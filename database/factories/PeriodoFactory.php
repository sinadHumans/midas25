<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Periodo;

class PeriodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Periodo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'inicio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'termino' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'motivo' => $this->faker->text(),
            'comentarios' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
