<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'senha' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O campo email deve ser um email válido!',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres!',
            'senha.required' => 'O campo senha é obrigatório!',
            'senha.min' => 'O campo senha deve ter no mínimo 8 caracteres!',
        ];
    }
}
