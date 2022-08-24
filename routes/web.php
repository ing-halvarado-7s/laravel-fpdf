<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ProductoController;


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

Route::get('pdf_der/{posiY}', [PdfController::class, 'pdfDerecha']);
Route::get('pdf_izq/{posiY}', [PdfController::class, 'pdfIzquierda']);

//Imagenes
Route::get('imagen', [ImagenController::class, 'index'])->name('imagen.index');

//Ejemplo de CRUD imagenes. producto
Route::resource('producto', ProductoController::class);
