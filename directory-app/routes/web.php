<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ViewController;
use Illuminate\Routing\ViewController as RoutingViewController;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

//Enviar directo a vista admin

Route::get('/directorio', [ViewController::class, 'directory'])->name('Directorio');
Route::get('/', [ViewController::class,'index'])->name('Inicio');
Route::get('/directorio/iglesia/{id}', [ViewController::class, 'church'])->name('church');