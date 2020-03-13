<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        "datacadastro","data_validade",
        "titulo",
        "descricao",
        "lote",
        "status",
        "categoria_id",
        "codigobarras",
        "data_fabricacao",
        "data_vencimento",
        "unidade_medida",
        "obs",
        "user_id",
        "fornecedor_id",
        "fabricante_id","local_armazenamento_id","status"
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function fabricante()
    {
        return $this->belongsTo('App\Fabricante');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

}
