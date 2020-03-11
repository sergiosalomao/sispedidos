<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FornecedorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome_fantasia' => 'required',
            'cpf_cnpj' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'nome_fantasia.required' => 'nome fantasia é obrigatorio',
            'cpf_cnpj.required' => 'CPF/CNPJ é obrigatorio',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
