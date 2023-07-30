<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VermifugoRequest extends FormRequest
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
            'nome' => 'required|string',
            'data_aplicacao' => 'required|date',
            'data_aplicacao' => 'before:proxima_aplicacao',
            'proxima_aplicacao' => 'after:data_aplicacao',
            'proxima_aplicacao' => 'required|date',
            'preco' => 'required|numeric',
            'descricao' => 'nullable|string|max:250',
            'animal_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'data_aplicacao.required' => 'O campo data de aplicação é obrigatório',
            'data_aplicacao.before' => 'A data de aplicação deve ser anterior a próxima aplicação',
            'proxima_aplicacao.required' => 'O campo próxima dose é obrigatório',
            'proxima_aplicacao.after' => 'A próxima aplicação deve ser posterior a data de aplicação',
            'preco.required' => 'O campo preço é obrigatório',
            'descricao.max' => 'O campo observação deve ter no máximo 250 caracteres',
            'animal_id.required' => 'O campo animal é obrigatório',
        ];
    }
}
