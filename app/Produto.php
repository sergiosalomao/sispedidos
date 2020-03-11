<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'id',
        'datacadastro',
        'fornecedor_id',
        'descricao',
        'data_fabricacao',
        'data_validade',
        'imagem',
        'fabricante_id',
        'categoria_id'

    ];

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }
    public function fabricante()
    {
        return $this->belongsTo('App\Fabricante');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
