<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
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
    return view('welcome');
});

// user must me logged in to see get to these links
Route::middleware(["auth"])->group(function(){
    Route::put('initialize/deelnemers', [adminController::class, 'getAllPlayers'])->name('players.initialize');                                 // Initialize all players
    Route::put('deelnemers/reset', [adminController::class, 'resetPlayers'])->name('players.reset');                                            // Reset all players 
    Route::put('deelnemer/toevoegen', [adminController::class, 'addPlayer'])->name('player.add');                                               // add new player
    Route::put('flights/generate', [adminController::class, 'generateFlights'])->name('flights.generate');                                      // generate flights
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/feedback', function () {
    return view('feedback');
})->middleware(['auth'])->name('feedback');



require __DIR__.'/auth.php';
