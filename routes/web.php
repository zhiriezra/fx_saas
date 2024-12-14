<?php

use App\Http\Controllers\AgentsController;
use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Agents routes
    Route::get('/agents', [AgentsController::class, 'index'])->name('agents');
    Route::get('/agents/{uuid}', [AgentsController::class, 'show'])->name('agent.show');

});


Route::domain('{domain}.fx-saas.test')->group(function (){

});


