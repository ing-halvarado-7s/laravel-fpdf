<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DownloadsController;


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

Route::get('pdf_der/{posiY}', [PdfController::class, 'pdfDerecha'])->name('pdfDerecha');
Route::get('pdf_izq/{posiY}', [PdfController::class, 'pdfIzquierda'])->name('pdfIzquierda');

//Imagenes
Route::resource('imagenes', ImagenController::class);
Route::post('posicion',  [ImagenController::class, 'enviarDatos'])->name('imagenes.enviardatos');

//Ejemplo de CRUD imagenes. producto
Route::resource('producto', ProductoController::class);

//Ejemplo para subir pdf en laravel
Route::get('/form', [App\Http\Controllers\UpPdfController::class, 'mform'])->name('form');
Route::post('/guardar', [App\Http\Controllers\UPPdfController::class, 'mguardar'])->name('guardar');

//Descargar archivo
Route::get('/download/{file}', [DownloadsController::class,'download'])->name('download.file');

//Validar rut
Route::get('validar_rut', function () {return view('validarRut.index');
});
