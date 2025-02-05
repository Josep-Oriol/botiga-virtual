<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main/principal');
});

Route::resources([
    "categorias" => CategoriaController::class
]);
