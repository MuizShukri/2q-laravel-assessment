<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CompanyIndex;
use App\Livewire\CompanyShow;
use App\Livewire\CompanyCreate;
use App\Livewire\CompanyEdit;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/companies', CompanyIndex::class)->name('companies.index');
    Route::get('/companies/show/{company}', CompanyShow::class)->name('companies.show');
    Route::get('/companies/create', CompanyCreate::class)->name('companies.create');
    Route::get('/companies/{company}/edit', CompanyEdit::class)->name('companies.edit');
});

require __DIR__.'/auth.php';
