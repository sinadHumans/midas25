<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguroUpdateRequest extends FormRequest
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
            'institucion' => ['required', 'string', 'max:250'],
            'tipo' => ['required', 'string', 'max:250'],
            'forma' => ['required', 'string', 'max:250'],
            'prima' => ['required', 'string', 'max:250'],
            'vigencia' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
