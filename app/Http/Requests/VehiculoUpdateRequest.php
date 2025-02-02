<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoUpdateRequest extends FormRequest
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
            'marca' => ['required', 'string', 'max:250'],
            'modelo' => ['required', 'string', 'max:250'],
            'valor' => ['required', 'string', 'max:250'],
            'pagado' => ['required', 'string', 'max:250'],
            'abono' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
