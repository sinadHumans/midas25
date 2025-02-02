<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estudios;

class EstudiosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudios::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idUsuario' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'idEmpresa' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nombreCandidato' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'apePaterno' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'apeMaterno' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'puesto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaSolicitud' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'valida' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'realizo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'foto' => $this->faker->text(),
            'estatus' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'rfc' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'curp' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'archivo' => $this->faker->text(),
            'proceso' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaTermino' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'motivoCancelacion' => $this->faker->text(),
            'fechaCancelacion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'usuarioCancela' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'encuestador' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaCita' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'horacita' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nss' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'tiposervicio' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'telefono' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'correo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'verdoc' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'encuViaticos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'encuTel' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'encuDireccion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estatusper' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'sexo' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'edad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'estadoCivil' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'lugarNacimiento' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fechaNacimiento' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'escolaridad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'llamadaEmergencia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'parentesco' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'telEmergencia' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'hijos' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nacionalidad' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'viveCon' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'direccion' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'celular' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'otroContacto' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'infonavit' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'fonacot' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'cv' => $this->faker->text(),
            'img' => $this->faker->text(),
        ];
    }
}
