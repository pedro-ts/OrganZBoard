<?php

namespace App\Http\Requests\Local;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLocalRequest extends FormRequest
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
            'strCep' => ['required', 'string', 'size:8'],
            'strRua' => ['required', 'string', 'max:150'],
            'intNumero' => ['required', 'integer'],
            'strComplemento' => ['sometimes', 'nullable', 'string', 'max:150'],
            'strBairro' => ['required', 'string', 'max:100'],
            'strCidade' => ['required', 'string', 'max:100'],
            'strEstado' => ['required', 'string', 'max:2'],
        ];
    }
}
