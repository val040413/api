<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre','empresa'
    ];

    protected $table = 'proveedor';

    public function producto(){
        return $this->hasMany('App\Producto','id_proveedor');
    }
}
