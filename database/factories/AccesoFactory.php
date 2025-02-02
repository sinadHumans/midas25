<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Acceso;

class AccesoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Acceso::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acceso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
