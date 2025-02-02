<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Redes;

class RedesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Redes::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'facebook' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'twitter' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'instagram' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'linkedin' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
