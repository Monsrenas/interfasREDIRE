<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerCrontroller;
use Illuminate\Support\Facades\Http;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/BorrarSN/{$id}', function () {
    return view('borrar');
});
*/

Route::get('/BorrarSN/{id}',function (string $id) {
    return view('borrar')->with(['id' => $id]);
});

Route::get('/material/{id}', [ManagerCrontroller::class, 'VerMaterial']);
Route::get('/', [ManagerCrontroller::class, 'ListaMateriales'])->name('material.lista');
Route::post('/Xmaterial', [ManagerCrontroller::class, 'ActuaMaterial']);



Route::get('/BorraMaterial/{id}',function (string $id) {
    $url = env('URL_SERVER_API','http//127.0.0.1');
    $response = Http::delete($url.'/material/'.$id)->json();
    return redirect()->route('material.lista');
});

Route::get('/categorias',function () {
    $url = env('URL_SERVER_API','http//127.0.0.1');
    $response = Http::get($url.'/categorias')->json();
    return view('adm_categorias')->with(['datos' => $response]);
});

Route::get('/categoria/{id}',function (string $id) {
    $url = env('URL_SERVER_API','http//127.0.0.1');
    $response = Http::get($url.'/categoria/'.$id)->json();
    return view('categoria')->with(['catedit' => $response[0]]);
});

Route::post('/Xcategoria', [ManagerCrontroller::class, 'ActuaCategoria']);
