<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudioStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'idUsuario' => ['required', 'string', 'max:250'],
            'idEmpresa' => ['required', 'string', 'max:250'],
            'nombreCandidato' => ['required', 'string', 'max:250'],
            'apePaterno' => ['required', 'string', 'max:250'],
            'apeMaterno' => ['required', 'string', 'max:250'],
            'puesto' => ['required', 'string', 'max:250'],
            'fechaSolicitud' => ['required', 'string', 'max:250'],
            'valida' => ['required', 'string', 'max:250'],
            'realizo' => ['required', 'string', 'max:250'],
            'foto' => ['required', 'string'],
            'estatus' => ['required', 'string', 'max:250'],
            'rfc' => ['required', 'string', 'max:250'],
            'curp' => ['required', 'string', 'max:250'],
            'archivo' => ['required', 'string'],
            'proceso' => ['required', 'string', 'max:250'],
            'fechaTermino' => ['required', 'string', 'max:250'],
            'motivoCancelacion' => ['required', 'string'],
            'fechaCancelacion' => ['required', 'string', 'max:250'],
            'usuarioCancela' => ['required', 'string', 'max:250'],
            'encuestador' => ['required', 'string', 'max:250'],
            'fechaCita' => ['required', 'string', 'max:250'],
            'horacita' => ['required', 'string', 'max:250'],
            'nss' => ['required', 'string', 'max:250'],
            'tiposervicio' => ['required', 'string', 'max:250'],
            'telefono' => ['required', 'string', 'max:250'],
            'correo' => ['required', 'string', 'max:250'],
            'verdoc' => ['required', 'string', 'max:250'],
            'encuViaticos' => ['required', 'string', 'max:250'],
            'encuTel' => ['required', 'string', 'max:250'],
            'encuDireccion' => ['required', 'string', 'max:250'],
            'estatusper' => ['required', 'string', 'max:250'],
            'sexo' => ['required', 'string', 'max:250'],
            'edad' => ['required', 'string', 'max:250'],
            'estadoCivil' => ['required', 'string', 'max:250'],
            'lugarNacimiento' => ['required', 'string', 'max:250'],
            'fechaNacimiento' => ['required', 'string', 'max:250'],
            'escolaridad' => ['required', 'string', 'max:250'],
            'llamadaEmergencia' => ['required', 'string', 'max:250'],
            'parentesco' => ['required', 'string', 'max:250'],
            'telEmergencia' => ['required', 'string', 'max:250'],
            'hijos' => ['required', 'string', 'max:250'],
            'nacionalidad' => ['required', 'string', 'max:250'],
            'viveCon' => ['required', 'string', 'max:250'],
            'direccion' => ['required', 'string', 'max:250'],
            'celular' => ['required', 'string', 'max:250'],
            'otroContacto' => ['required', 'string', 'max:250'],
            'infonavit' => ['required', 'string', 'max:250'],
            'fonacot' => ['required', 'string', 'max:250'],
            'cv' => ['required', 'string'],
            'img' => ['required', 'string'],
        ];
    }
}
