<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienesinmuebleUpdateRequest extends FormRequest
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
            'tipo' => ['required', 'string', 'max:250'],
            'ubicacion' => ['required', 'string', 'max:250'],
            'valor' => ['required', 'string', 'max:250'],
            'pagado' => ['required', 'string', 'max:250'],
            'abono' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
