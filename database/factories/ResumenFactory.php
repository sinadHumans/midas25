<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Resumen;

class ResumenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resumen::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'social' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'escolar' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'economica' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'laboral' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'actitud' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'observaciones' => $this->faker->text(),
            'recomendacion' => $this->faker->text(),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'observacionesPersonal' => $this->faker->text(),
            'observacionesLaboral' => $this->faker->text(),
            'cali' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
