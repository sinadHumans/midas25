<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cuentasinversiones;

class CuentasinversionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cuentasinversiones::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'institucion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'objetivo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'deposito' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
