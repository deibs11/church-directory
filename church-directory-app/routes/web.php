<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChurchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [ChurchController::class, 'index'])->name('churches.index');
Route::get('/churches/create', [ChurchController::class, 'create'])->name('churches.create');
Route::post('/churches', [ChurchController::class, 'store'])->name('churches.store');
Route::get('/churches/{id}/edit', [ChurchController::class, 'edit'])->name('churches.edit');
Route::put('/churches/{id}', [ChurchController::class, 'update'])->name('churches.update');
Route::delete('/churches/{id}', [ChurchController::class, 'destroy'])->name('churches.destroy');