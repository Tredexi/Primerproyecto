@extends('layout.app')
@section('titulopagina','Empresa E-Comerce')
@push('css')
    <style>
        .fondo {
            background: #302886;
        }

        .img-responsive{
            width: 100%;
            height: 100%;
        }
    </style>
@endpush

@section('titulo')
    Bienvenido a la pagina EC 
@endsection


@section('subtitulo')
    Explorando las oportunidades con laravel 12
@endsection

@section('link1','Active')
@section('titulo1')
    <h1>About Me</h1>
@endsection
@section("desscripcion_about")
    {{ $descripcion_about }}
@endsection
@section('Autor')
    {{ $nombre }}
@endsection
@section("actividad",$actividad)
@section("texto_ejemplo")
    {{ $texto_ejemplo }}
@endsection
@section("contenido_listado")
    <h2> Listado de Usuarios Registrados</h2>
   
@endsection