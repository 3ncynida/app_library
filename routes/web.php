<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('admin.buku.index');
// });

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [BukuController::class, 'adminindex'])->name('buku.index');
    Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::get('{id}/detail', [BukuController::class, 'detail'])->name('buku.detail');
    Route::put('buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
