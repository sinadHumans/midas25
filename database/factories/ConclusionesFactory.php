<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Conclusiones;

class ConclusionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conclusiones::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'acercaCandidato' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acercaFamilia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'conclucionesEntrevistador' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'participacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'entorno' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'referencias' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentariosGenerales' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'analisisVerificacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'atendio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'presento' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'documentacionCompartida' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'referenciasPersonales' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estatusfinal' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
