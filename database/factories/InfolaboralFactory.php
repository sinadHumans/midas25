<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Infolaboral;

class InfolaboralFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Infolaboral::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'laboral' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'campol' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechal' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acuerdol' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'civiles' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'campoc' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechac' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acuerdoc' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'familiares' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'campof' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaf' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acuerdof' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'penales' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'campop' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechap' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acuerdop' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'administrativa' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'campoa' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaa' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acuerdoa' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'internacional' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'campoi' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechai' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acuerdoi' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'sat' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'camposat' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechasat' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'acuerdosat' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comentariol' => $this->faker->text(),
            'comentarioc' => $this->faker->text(),
            'comentariof' => $this->faker->text(),
            'comentariop' => $this->faker->text(),
            'comentarioa' => $this->faker->text(),
            'comentarioi' => $this->faker->text(),
            'comentariosat' => $this->faker->text(),
        ];
    }
}
