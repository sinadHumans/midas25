<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Documentospresentados;

class DocumentospresentadosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Documentospresentados::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'documento' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ine' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comprobante' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acta' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cartas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'aviso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentarios' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
