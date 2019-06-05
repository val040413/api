<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function insertar(Request $request){
        
        $rules = [
            'nombre' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'id_proveedor' => 'required|exists:proveedor,id',
            'id_categoria' => 'required|exists:categoria,id'
        ];
        $datos = $request->all();
        $errores = $this->validate($datos,$rules);
        if(count($errores)>0){
            return $this->error($errores);
        }
        $producto = Producto::create($datos);
        $producto->categoria = $producto->categoria->nombre;
        $producto->proveedor = $producto->proveedor;
        return $this->success($producto);
    }

    public function actualizar(Request $request){   
        $array = $request->all();
        $data = Producto::find($request->id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        $data->update($array);
        return $this->success($data);
    }

    public function eliminar($id){
        $data = Producto::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        
        $data->delete();
        return $this->succes(["objeto eliminado correctamente"]);
    }

    public function listar(){
        $data = Producto::get();
        return $this->success($data);
    }

    public function mostrar($id){
        $data = Producto::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        return $this->success($data);
    }
}
