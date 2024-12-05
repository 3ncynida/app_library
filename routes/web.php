<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('buku', [BukuController::class, 'adminindex'])->name('buku.index');
    Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});