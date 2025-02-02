<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Refelaborales;

class RefelaboralesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Refelaborales::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'empresa' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'giro' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'direccion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'telefono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaIngreso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaEgreso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'puesto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'area' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'salario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'motivoSalida' => $this->faker->text(),
            'quienProporciono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'puestoProporciono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'calificacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'demanda' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'volveria' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'porque' => $this->faker->text(),
            'observaciones' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'candidatoes' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'periodosInactivo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
