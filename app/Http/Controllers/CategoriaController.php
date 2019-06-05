<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function insertar(Request $request){
        
        $rules = [
            'nombre' => 'required'
        ];
        $datos = $request->all();
        $errores = $this->validate($datos,$rules);
        if(count($errores)>0){
            return $this->error($errores);
        }
        $categoria = Categoria::create($datos);
        return $this->success($categoria);
    }

    public function actualizar(Request $request){   
        $array = $request->all();
        $data = Categoria::find($request->id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        $data->update($array);
        return $this->success($data);
    }

    public function eliminar($id){
        $data = Categoria::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        
        $data->delete();
        return Controller::success(["objeto eliminado correctamente"]);
    }

    public function listar(){
        $data = Categoria::get();
        return $this->success($data);
    }

    public function mostrar($id){
        $data = Categoria::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        return $this->success($data);
    }
}
