<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Domicilio;

class DomicilioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Domicilio::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'delegacionMunicipio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ciudad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cp' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tiempoResindir' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tel1' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tel2' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tel3' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cel1' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cel2' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cel3' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'calle' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'numero' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'colonia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
