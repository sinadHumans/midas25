<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Investigaciones;

class InvestigacionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investigaciones::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'cuentaConstancia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'proporciono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'casoNo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'demandado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'actualmente' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estabilidad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'inactividad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'registoPatronal' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'referenciayPeriodos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'dosEmpleos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'ausentismo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'abandono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'desempenoRegular' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'omitio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'informacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'referencias' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'confiable' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentarios' => $this->faker->text(),
            'notasLegales' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
