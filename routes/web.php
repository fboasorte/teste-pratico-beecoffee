<?php

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

Route::get('medicos/busca-especialidades', 'MedicoController@buscaEspecialidades')->name('medicos.buscaEspecialidades');
Route::resource('medicos','MedicoController');
Route::resource('pacientes','PacienteController');
Route::resource('especialidades','EspecialidadeController');

Route::get('atendimentos/busca-medico', 'AtendimentoController@buscaMedico')->name('atendimentos.buscaMedico');
Route::get('atendimentos/busca-paciente', 'AtendimentoController@buscaPaciente')->name('atendimentos.buscaPaciente');
Route::resource('atendimentos','AtendimentoController');