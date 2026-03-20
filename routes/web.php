<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Pagina;

Route::get('/', function () {
    return view('welcome');
})->name('vista_inicio');

Route::get('/contact', function(){
    $nombre = "Didier Sanchez";
    return view('contact', ['nombre'=>$nombre, 'carrera'=>'LATI']);
})->name('contact');

Route::get('/principal', function(){
    $datos = ["titulo"=>"Tienda Virtual - Vista Principal",
    "mensaje"=>"Bienvenido a la vista principal"];
    return view('principal', $datos);
})->name('principal');

Route::get('/empresa', [HomeController::class, 'empresa'])->name('empresa');
//define eñ método a utiilizar
Route::get('nuevoregistro', function(){
    $Pagina = new Pagina();
    $Pagina->name='Carlos';
    $Pagina->email='carlos1@gmail.com';
    $Pagina->email_verified_at=date('y-m-d');
    $Pagina->password='123456';
    $Pagina->avatar='user.png';
    $Pagina->telefono='99999';
    $Pagina->calle='89';
    $Pagina->save();
    return $Pagina;
});
//definimos el metodo para buscar el id
//para obtener unicamente un registro
route::get('buscarpaginaid', function(){
    $POST=Pagina::find(1);
    return $POST;
});

//definimos el metodo para buscar un campo determinado
route::get('buscarxnombre', function(){
    $POST=Pagina::where('name','carlos')->first();
    return $POST;
});
//para recurperar mas de un registro
route::get('obtenertodos', function(){
    $POST=Pagina::all();
    return $POST;
});
//Definimos el metodo para cambiar un registro
route::get('updatename', function(){
    $POST=Pagina::where('name','carlos')->first();
    $POST->email='carlos1234@gmail.com';
    $POST->save();
    return $POST;
});
//Definimos el metodo para obtener una lista conforme a un criterio determinado
//para obtener mas de un registro
route::get('filter', function(){
    $POST=Pagina::where('calle','like','%123%')->orderBy("id","desc")->get();
    return $POST;
});
//para especificar unicamente los campos que quiera
route::get('trescampos', function(){
    $POST=Pagina::select('name','email','telefono')->get();
    return $POST;
});
//conforme a una seleccion solamente traerme unb cierto numero de registros
route::get('filtroxnumero', function(){
    $POST=Pagina::select('name','email')->orderBy('name')->take(2)->get();
    return $POST;
});
//para eliminar un determinado tregistro
route::get('eliminar_registro', function(){
    $POST=Pagina::find(3);
    $POST->delete();
    return "Eliminado";
});
//obtener la fecha conforme a un formato
route::get('obtenerfechaformato', function(){
    $POST=Pagina::select('name','email','create_at')->find(3);

    
    return $POST;
});
//obtener el valor de un is_active
route::get('obtenerstatus', function(){
    $POST=Pagina::find(1);



    dd($POST->is_active);
});
//el siguiente metodo de debe de llamar mediante un metodo de tipo request (por ejemplo, utilizando ajax o postman)
route::put('/actualizar-dato/{id}',[HomeController::class,'update'])->name('dato.update');
Route::put('/eliminar-logico/{id}', [HomeController::class, 'eliminarLogico']);
Route::delete('/eliminar-fisico/{id}', [HomeController::class, 'eliminarFisico']);