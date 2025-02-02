<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Entornohabitacional;

class EntornohabitacionalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entornohabitacional::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idEstudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipoZona' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipoVivienda' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'edificacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'titular' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'parentesco' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'numRecamaras' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'sala' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'comedor' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cocina' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'garaje' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'jardin' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nomBano' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tipobano' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'viasdeacceso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'medioTransporte' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tiempoServicio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'entreCalles' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'color' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'porton' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'referencias' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'observaciones' => $this->faker->text(),
            'idUSuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'agua' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'luz' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'pavimentacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'telefono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'transporte' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'vigilancia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'areas' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'drenaje' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'paredes' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'techos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'pisos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'telNormal' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'telPlasma' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estereo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'dvd' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'blueray' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estufa' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'horno' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'lavadora' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'centrolavado' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'refrigerador' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'computadora' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'extensionInmueble' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'condicionesInmueble' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'condicionesMobiliario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'orden' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'limpieza' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'delincuencia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'vandalismo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'drogadiccion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'alcoholismo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estudio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'zotehuela' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'patio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'internet' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'renta' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'regadera' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
