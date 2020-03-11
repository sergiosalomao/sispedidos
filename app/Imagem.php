<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';
    
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
         'tipo',
        'imagem',
        'produto_id',
        
    ];
    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

}
