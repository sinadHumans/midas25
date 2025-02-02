<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Infonavit;

class InfonavitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Infonavit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'estatus' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'puntos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'subcuenta' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'maximo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'hipoteca' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
