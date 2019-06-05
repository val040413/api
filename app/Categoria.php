<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    protected $table = 'categoria';

    protected $fillable = [
        'nombre'
    ];

    public function producto(){
        return $this->hasMany('App\Producto','id_categoria');
    }
    
}
