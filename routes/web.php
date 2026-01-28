<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


route::get('/hello', HomeController::class);
route::get('post/mensaje',[PostController::class,'Mensaje']);

/*
Route::get('/', function () {
    return view('welcome');
});
*/