<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    protected $fillable = [
        'nombre', 'cantidad', 'precio','id_categoria','id_proveedor'
    ];

    public function categoria(){
        return $this->belongsTo('App\Categoria','id_categoria');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedor','id_proveedor');
    }
}
