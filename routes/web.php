<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PacienteController;
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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


// Admin Routes
Route::get('/admins', 'AdminController@index')->name('admins.index');
Route::get('/admins/create', 'AdminController@create')->name('admins.create');
Route::post('/admins/store', 'AdminController@store')->name('admins.store');

// Pacientes
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');

// Rota para mostrar detalhes de um paciente específico
Route::get('/pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');

Auth::routes();
