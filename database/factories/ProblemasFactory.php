<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Problemas;

class ProblemasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Problemas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'informante' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentarios' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'dato' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
