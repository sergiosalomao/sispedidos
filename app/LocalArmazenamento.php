<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalArmazenamento extends Model
{
    protected $table =  'local_armazenamento';
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'descricao'

    ];

}
