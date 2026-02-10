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
    return view('welcome');
});
Route::get('/mi-ruta-app', function () {
    $nombre = "cristian";
    $apellido = "cogollo";
    $nombreCompleto = $nombre . $apellido;
    $age= rand(18, 60);
    $height=1.75;
    $islogin=(bool) rand(0,1);
    echo $nombreCompleto;
    echo"*************ESTRUCTURA DE DATOS****************";
    $message = "<br> <br> Hola, mi nombre es $nombreCompleto, tengo $age años, mido $height metros <br> <br>" ;
    echo $message;
    if ($age < 18) {
        echo "<br> <br> Soy menor de edad.";
    } else if ( $age > 50) {
        echo "<br> <br> Soy menor de edad.";
    }else {echo "<br> <br> Soy adulto.";};

    echo"<br> <br> *************FUNCIONES****************<br> <br>";

        echo printUser($nombreCompleto, $age);
    #return "HOLA ESTA ES MI RUTA EN LARAVEL";

    $productsName = ["camisa", "pantalon", 25, true];
    $teclado = [
        "marca" => "logitech",
        "modelo" => "g213",
        "color" => "negro",
        "precio" => 100,
        "distribuciones" => ["latino", "mexico", "americano"]
    ];

    echo $teclado["marca"];
    foreach ($productsName as $item) {
        echo "<br> $item";
    }
});
 function printUser($nombre, $age){
        return "$nombre tiene $age años";
    }
