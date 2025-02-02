<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Historiallaboral;

class HistoriallaboralFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Historiallaboral::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ultimo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'vida' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nusemana' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'porcentaje' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'numeroempleadores' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'progresion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'finiquito' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'liquidacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'aguinaldo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'vacaciones' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentarios' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
