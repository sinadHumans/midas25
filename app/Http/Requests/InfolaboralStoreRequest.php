<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfolaboralStoreRequest extends FormRequest
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
            'laboral' => ['required', 'string', 'max:250'],
            'campol' => ['required', 'string', 'max:250'],
            'fechal' => ['required', 'string', 'max:250'],
            'acuerdol' => ['required', 'string', 'max:250'],
            'civiles' => ['required', 'string', 'max:250'],
            'campoc' => ['required', 'string', 'max:250'],
            'fechac' => ['required', 'string', 'max:250'],
            'acuerdoc' => ['required', 'string', 'max:250'],
            'familiares' => ['required', 'string', 'max:250'],
            'campof' => ['required', 'string', 'max:250'],
            'fechaf' => ['required', 'string', 'max:250'],
            'acuerdof' => ['required', 'string', 'max:250'],
            'penales' => ['required', 'string', 'max:250'],
            'campop' => ['required', 'string', 'max:250'],
            'fechap' => ['required', 'string', 'max:250'],
            'acuerdop' => ['required', 'string', 'max:250'],
            'administrativa' => ['required', 'string', 'max:250'],
            'campoa' => ['required', 'string', 'max:250'],
            'fechaa' => ['required', 'string', 'max:250'],
            'acuerdoa' => ['required', 'string', 'max:250'],
            'internacional' => ['required', 'string', 'max:250'],
            'campoi' => ['required', 'string', 'max:250'],
            'fechai' => ['required', 'string', 'max:250'],
            'acuerdoi' => ['required', 'string', 'max:250'],
            'sat' => ['required', 'string', 'max:250'],
            'camposat' => ['required', 'string', 'max:250'],
            'fechasat' => ['required', 'string', 'max:250'],
            'acuerdosat' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'idEstudio' => ['required', 'string', 'max:250'],
            'comentariol' => ['required', 'string'],
            'comentarioc' => ['required', 'string'],
            'comentariof' => ['required', 'string'],
            'comentariop' => ['required', 'string'],
            'comentarioa' => ['required', 'string'],
            'comentarioi' => ['required', 'string'],
            'comentariosat' => ['required', 'string'],
        ];
    }
}
