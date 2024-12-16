<?php

use App\Http\Controllers\AgentsController;
use App\Http\Controllers\FarmersController;
use App\Http\Controllers\FarmsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ValueChainsController;
use App\Http\Controllers\VendorsController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Value-chain departments
    Route::get('/value-chain', [ValueChainsController::class, 'index'])->name('value-chain.index');

    // Value-chain departments
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');

    // Vendors
    Route::get('/sales/vendors', [VendorsController::class, 'index'])->name('vendors');
    Route::get('/sales/vendors/{uuid}', [VendorsController::class, 'show'])->name('vendor.show');

    // Agents routes
    Route::get('/sales/agents', [AgentsController::class, 'index'])->name('agents');
    Route::get('/sales/agents/{uuid}', [AgentsController::class, 'show'])->name('agent.show');

    // Farmers routes
    Route::get('/sales/farmers', [FarmersController::class, 'index'])->name('farmers');
    Route::get('/sales/farmers/{uuid}', [FarmersController::class, 'show'])->name('farmer.show');

    // Farms routes
    Route::get('/sales/farms', [FarmsController::class, 'index'])->name('farms');
    Route::get('/sales/farms/{uuid}', [FarmsController::class, 'show'])->name('farm.show');




});


Route::domain('{domain}.fx-saas.test')->group(function (){

});


