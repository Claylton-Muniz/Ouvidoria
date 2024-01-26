<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'servidor' => 'required|min:3|max:255',
            'entrevistado' => 'nullable|min:0|max:255',
            'data_atual' => 'nullable|date',
            'data_nasc' => 'nullable|date',
            'email' => 'nullable|email',
            'telefone' => 'nullable|min:0|max:14',
            'endereco' => 'nullable|min:0|max:255',
            'sexo' =>  'nullable|in:Masculino,Feminino,Outro,PND',
            'mensagem' => 'nullable|min:0|max:255'
        ];
    }
}
