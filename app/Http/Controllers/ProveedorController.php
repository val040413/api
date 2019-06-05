<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
    public function insertar(Request $request){        
        $rules = [
            'nombre' => 'required',
            'empresa' => 'required'
        ];
        $datos = $request->all();
        $errores = $this->validate($datos,$rules);
        if(count($errores)>0){
            return $this->error($errores);
        }
        $proveedor = Proveedor::create($datos);
        return $this->success($proveedor);
    }

    public function actualizar(Request $request){   
        $array = $request->all();
        $data = Proveedor::find($request->id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        $data->update($array);
        return $this->success($data);
    }

    public function eliminar($id){
        $data = Proveedor::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        
        $data->delete();
        return $this->succes(["objeto eliminado correctamente"]);
    }

    public function listar(){
        $data = Proveedor::get();
        return $this->success($data);
    }

    public function mostrar($id){
        $data = Proveedor::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        return $this->success($data);
    }
}
