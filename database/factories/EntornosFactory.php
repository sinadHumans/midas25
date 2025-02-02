<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Entornos;

class EntornosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entornos::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'comentarios' => $this->faker->text(),
            'tiempoVivir' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'calle' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'numero' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'interior' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'colonia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'entre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'delegacionMunicpio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cp' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'color' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'dondeEs' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ubicación' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
