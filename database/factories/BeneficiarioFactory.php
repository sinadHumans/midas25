<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Beneficiario;

class BeneficiarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beneficiario::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'parentesco' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'edad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ocupacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'donde' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'calle' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'numero' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'colonia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'delegacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ciudad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cp' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tiempo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'telefono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
