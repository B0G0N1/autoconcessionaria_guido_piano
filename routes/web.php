<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\OptionalController;

use App\Http\Controllers\Guest\GuestController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function() {
    Route::resource('/cars', CarController::class)->parameters([
        'cars' => 'car:slug'
    ]);
    Route::resource('/brands', BrandController::class)->parameters([
        'brands' => 'brand:slug'
    ]);
    Route::resource('/optionals', OptionalController::class)->parameters([
        'optionals' => 'optional:slug'
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cars', [GuestController::class, 'cars'])->name('guest.cars.index');
Route::get('/cars/{slug}', [GuestController::class, 'showCar'])->name('guest.cars.show');

Route::get('/brands', [GuestController::class, 'brands'])->name('guest.brands.index');
Route::get('/brands/{slug}', [GuestController::class, 'showBrand'])->name('guest.brands.show');

Route::get('/optionals', [GuestController::class, 'optionals'])->name('guest.optionals.index');
Route::get('/optionals/{slug}', [GuestController::class, 'showOptional'])->name('guest.optionals.show');

require __DIR__.'/auth.php';
