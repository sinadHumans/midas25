<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Salud;

class SaludFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salud::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'droga' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cualDroga' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fuma' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'frecuenciaFuma' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'bebidas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'frecuenciaBebidas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cafe' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'frecuenciaCafe' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'lentes' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'diagnostico' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'intervenciones' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'dequeintervenciones' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'enfermedadesCronicas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'dequeCronicas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'hereditarias' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cualHereditarias' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'quienConstante' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'porqueConstante' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ultimaVez' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'considera' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'porqueConsidera' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'deporte' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'pasatiempo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ultimavezDeque' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'embarazo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
