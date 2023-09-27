<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MerchantController;

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
Route::middleware(['auth' => 'isAdmin'])->group(function() {
    Route::get('/merchants',[AdminController::class, 'index'])->name('index.show');
    Route::get('/merchants/{name}',[AdminController::class, 'showMerchantByName'])->name('show.merchant');
    Route::get('/merchants/{name}/users',[AdminController::class, 'showMerchantUserByName'])->name('show.users');
});
Route::middleware(['auth' => 'isMerchant'])->group(function() {
    Route::get('/users', [MerchantController::class, 'index'])->name('index.users');
});
Route::middleware(['auth' => 'isUser'])->group(function() {
    Route::get('/user', [UserController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
