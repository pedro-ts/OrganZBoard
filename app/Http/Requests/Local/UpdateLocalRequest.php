<?php

namespace App\Http\Requests\Local;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLocalRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'strCep' => ['sometimes', 'string', 'size:8'],
            'strRua' => ['sometimes', 'string', 'max:150'],
            'intNumero' => ['sometimes', 'integer'],
            'strComplemento' => ['sometimes', 'nullable', 'string', 'max:150'],
            'strBairro' => ['sometimes', 'string', 'max:100'],
            'strCidade' => ['sometimes', 'string', 'max:100'],
            'strEstado' => ['sometimes', 'string', 'max:2'],
        ];
    }
}
