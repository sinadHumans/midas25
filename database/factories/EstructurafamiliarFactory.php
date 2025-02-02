<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estructurafamiliar;

class EstructurafamiliarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estructurafamiliar::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'familiar' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'edad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ocupacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'laboraEstudia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'calle' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'numero' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'colonia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'delegacionMunicipio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ciudad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cpde' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tiempoReside' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tel1' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
