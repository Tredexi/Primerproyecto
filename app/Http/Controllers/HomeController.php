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
}
