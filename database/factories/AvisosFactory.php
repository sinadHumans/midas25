<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Avisos;

class AvisosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Avisos::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'mensaje' => $this->faker->text(),
            'dirigido' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipo' => $this->faker->text(),
            'estatus' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
