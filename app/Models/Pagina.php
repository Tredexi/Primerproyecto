<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Pagina extends Model
{
    //Se especifica la tabla con la cual se pretende trabajar
    //se recomienda que el modelo se escriba en singular y las tablas en plural
    protected $table='paginas';
    //Creamos un atributo mediante cast para el resguardo y la obtencion de los datos
    protected function cast():array{
        return[
            'create_at'=>'datetime:d-m-y',
            'is_active'=>'boolean'
        ];
    }

    protected function name():Attribute{
        return Attribute::make(
            set:function($value){//MUTADOR
                return strtolower($value);
            },
            get:function($value){//ACCESOR
                return ucfirst($value);
            }
        );
    }

    public function ObtenerListado(){
        $listadousuarios=Pagina::all();
        return $listadousuarios;
    }

    public function BuscarId($id){
        $registro=Pagina::find($id);
        return $registro;
    }
}