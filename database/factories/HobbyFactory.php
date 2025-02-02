<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hobby;

class HobbyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hobby::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'deportes' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cual' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'frecuencia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'pasatiempos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'otros' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
