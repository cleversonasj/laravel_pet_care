<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nome' => 'required|string',
            'data_nascimento' => 'required|date',
            'data_nascimento' => 'before:today',
            'especie' => 'required|string',
            'raca' => 'required|string',
            'sexo' => 'required|string',
            'peso' => 'required|numeric',
            'porte' => 'required|string',
            'observacao' => 'nullable|string|max:250',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'user_id' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser um texto.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data.',
            'data_nascimento.before' => 'O campo data de nascimento deve ser anterior a data atual.',
            'especie.required' => 'O campo espécie é obrigatório.',
            'especie.string' => 'O campo espécie deve ser um texto.',
            'raca.required' => 'O campo raça é obrigatório.',
            'raca.string' => 'O campo raça deve ser um texto.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'sexo.string' => 'O campo sexo deve ser um texto.',
            'peso.required' => 'O campo peso é obrigatório.',
            'peso.numeric' => 'O campo peso deve ser um número.',
            'porte.required' => 'O campo porte é obrigatório.',
            'porte.string' => 'O campo porte deve ser um texto.',
            'observacao.string' => 'O campo observação deve ser um texto.',
            'observacao.max' => 'O campo observação deve ter no máximo 250 caracteres.',
            'foto.image' => 'O campo foto deve ser uma imagem.',
            'foto.mimes' => 'O campo foto deve ser uma imagem do tipo: jpeg, png, jpg, gif, svg.',
            'user_id.numeric' => 'O campo usuário deve ser um número.',
        ];
    }
}
