<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'nome_fantasia','razao_social',
        'cpf_cnpj',
        'telefone',
        'contato',
        'cep',
        'bairro',
        'logradouro',
        'cidade',
        'uf',
        'status',
        'obs',
        'email',
        'numero'
    ];

}
