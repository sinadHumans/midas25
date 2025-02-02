<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaStoreRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:250'],
            'direccion' => ['required', 'string'],
            'telefono' => ['required', 'string', 'max:250'],
            'correo' => ['required', 'string', 'max:250'],
            'contacto' => ['required', 'string', 'max:250'],
            'paginaWeb' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string'],
            'comentarios' => ['required', 'string'],
            'archivo' => ['required', 'string'],
        ];
    }
}
