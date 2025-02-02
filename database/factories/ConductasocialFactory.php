<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Conductasocial;

class ConductasocialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conductasocial::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'quienEstuvo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'conductaEntrevistado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'relacionVecinos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'pertenecegrupo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'problemasLegales' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'familiarRecluido' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'familiaresAdentro' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
