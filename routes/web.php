<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Main page';
});

Route::get('/hello', function () {
    return 'Hello world!';  
});

//O parâmetro {name} é passado para a função

Route::get('/greet/{name}', function ($name) {
    return 'Good morning ' . $name . '!';
});

Route::get('/redirect', function () {
    return redirect('/hello');
});


Route::get('/showNumber/{number}', function($number) {
    if (!is_numeric($number)) {
        return 'The number is not numeric';
    }
    return 'The number is ' . $number;
});

//Nomeando a rota
Route::get('/namedRoute', function () {
    return 'This is a named route';
})->name('namedRoute');

//redirecionando para rota nomeada

Route::get('/redirectToNamedRoute', function () {
    return redirect()->route('namedRoute');
});

// rota de fallback (quando não encontrar uma rota correspondente) not found
Route::fallback(function () {
    return 'This is a fallback route';
});