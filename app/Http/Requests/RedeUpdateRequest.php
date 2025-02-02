<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedeUpdateRequest extends FormRequest
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
            'idEstudio' => ['required', 'string', 'max:250'],
            'facebook' => ['required', 'string', 'max:250'],
            'twitter' => ['required', 'string', 'max:250'],
            'instagram' => ['required', 'string', 'max:250'],
            'linkedin' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
