<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Documentacion;

class DocumentacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Documentacion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'titulo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'observaciones' => $this->faker->text(),
            'archivo' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'folio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'seccion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
