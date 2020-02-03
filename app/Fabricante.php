<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'nome',
        'cpfcnpj',
        'numero',
        'telefone',
        'contato',
        'cep',
        'bairro',
        'logradouro',
        'cidade',
        'uf',
        'status',
        'obs',
        'email'
    ];

}