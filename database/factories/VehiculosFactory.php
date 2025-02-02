<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Vehiculos;

class VehiculosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehiculos::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'marca' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'modelo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'valor' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'pagado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'abono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
