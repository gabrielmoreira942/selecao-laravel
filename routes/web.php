<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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
    return redirect()->route('client.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){

    Route::resource('client', ClientController::class);

    Route::get('my-account', [UserController::class, 'edit'])->name('user.edit');
    Route::put('my-account', [UserController::class, 'update'])->name('user.update');
    Route::delete('terminate-account', [UserController::class, 'destroy'])->name('user.destroy');

});


require __DIR__.'/auth.php';
