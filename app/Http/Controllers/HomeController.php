<?php

namespace App\Http\Controllers;

use App\Models\Pagina as ModelsPagina;
use Illuminate\Http\Request;
use App\Models\Pagina;
use Illuminate\Support\Facades\App;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    public function __invoke(){
        return view('hello');
    }
    public function empresa(){
        $datos['nombre']="Didier Nathanael Sanchez Tzeec";
        $datos['fecha']="2026-12-15";
        $datos['actividad']="Desarrollo de Software";
        $datos['descripcion_about']="Empresa dedicada al desarrollo de software a la medida de sus clientes ";
        $datos['texto_ejemplo']="Aqui ca la descripcion del texto de ejemplo";

        $usuarios=new Pagina();
        $datos["listadousuarios"]=$usuarios->ObtenerListado();
        return view ('empresa',$datos);
    }
    public function update(Request $request){
        $usuarios=new Pagina();
        $respuesta=$usuarios->BuscarId($request->id);
        if(!empty($respuesta)){
            $respuesta->name=$request->name;
            $respuesta->calle=$request->calle;
            $respuesta->save();

        }
        return $respuesta;
    }
    public function eliminarLogico($id){
        $usuario = Pagina::find($id);
        if($usuario){
            $usuario->is_active = 0; // Cambiamos el estatus a 0
            $usuario->save();
            return response()->json(['mensaje' => 'Eliminación lógica exitosa']);
        }
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }

    public function eliminarFisico($id){
        $usuario = Pagina::find($id);
        if($usuario){
            $usuario->delete(); // Elimina el registro por completo de la BD
            return response()->json(['mensaje' => 'Eliminación física exitosa']);
        }
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }
}
