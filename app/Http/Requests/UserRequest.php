<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'genero' => 'required|string|max:255',
            'senha' => 'required|string|min:8',
            'confirmar_senha' => 'required|string|min:8',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $senha = $this->input('senha');
            $confirmar_senha = $this->input('confirmar_senha');

            if (!empty($senha) && $senha !== $confirmar_senha) {
                $validator->errors()->add('confirmar_senha', 'A confirmação de senha não corresponde à senha fornecida.');
            }
        });
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.string' => 'O campo nome deve ser uma string!',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres!',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório!',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data!',
            'genero.required' => 'O campo gênero é obrigatório!',
            'genero.string' => 'O campo gênero deve ser uma string!',
            'senha.required' => 'O campo senha é obrigatório!',
            'senha.min' => 'O campo senha deve ter no mínimo 8 caracteres!',
            'confirmar_senha.required' => 'O campo confirmar senha é obrigatório!',
            'confirmar_senha.min' => 'O campo confirmar senha deve ter no mínimo 8 caracteres!',
        ];
    }
}
