<?php
namespace App\Models;

//use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use PhpParser\Node\Stmt\Return_;

class Pagina extends Model
{
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