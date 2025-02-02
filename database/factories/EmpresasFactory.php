<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresas;

class EmpresasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'direccion' => $this->faker->text(),
            'telefono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'correo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'contacto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'paginaWeb' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idUsuario' => $this->faker->text(),
            'comentarios' => $this->faker->text(),
            'archivo' => $this->faker->text(),
        ];
    }
}
