<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Situacion;

class SituacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Situacion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'parentesco' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'salario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ingreso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'concepto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'egresos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'observaciones' => $this->faker->text(),
            'superavit' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
