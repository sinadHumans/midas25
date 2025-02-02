<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Deudas;

class DeudasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deudas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cuentaDeuda' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'conQuien' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'monto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'abonoMensual' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'apagaren' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cuentaauto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'modelo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'placas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'valorAuto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'propiedad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ubicacon' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tarjetaCredito' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'bancotarjetaCredito' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'creditoAutorizado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tarjetaTienda' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'conquienTienda' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'creditoAutorizadotienda' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'observaciones' => $this->faker->text(),
        ];
    }
}
