<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('',[UsuarioController::class,'index']);
Route::get('create',[UsuarioController::class,'create']); 
Route::get('edit',[UsuarioController::class,'edit']);