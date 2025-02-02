<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Serviciomedico;

class ServiciomedicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Serviciomedico::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'infonavit' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'clinicai' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'incidentei' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipoi' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'imss' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'clinicaim' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'incidenteim' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipoim' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'issste' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'clinicais' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'incidenteis' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipois' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'seguro' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'clinicase' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'incidentese' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipose' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'privado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'aseguradora' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'incidentepri' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipopri' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'issemym' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'clinicaisse' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'incidenteisse' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipoisse' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'notiene' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
