<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome' => 'required',
            'cpfcnpj' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Descricao é obrigatoria',
            'cpfcnpj.required' => 'CPF/CNPJ é obrigatorio',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
