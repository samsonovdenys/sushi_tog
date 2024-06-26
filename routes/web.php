<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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
// WELCOME
Route::get('/', function () {
    return view('welcome');
});


// Nella scrermata 'group' devi inserire il Nome del Gruppo o il link to join.
Route::get('/group', [OrderController::class, 'group']);

// Nella scrermata 'user' devi inserire il Nome del user.
Route::get('/user', function () {
    return view('user');
});

// Se crei il Gruppo nuovo, vieni indirezzato al crete_group che creera group_id e passa a join.
Route::get('/crete_group/{group_name}', [OrderController::class, 'creteGroup']);

// Vieni indirizzato alla schermata details, dove sei obbligato ad inserire il Nome
Route::get('/join/{group_id}', [OrderController::class, 'join']);

// Nella schermata 'details' devi inserire Nome e cliccare 'Comincia ordinare'
Route::get('/details', [OrderController::class, 'details']);

Route::get('/order/{user_name}', [OrderController::class, 'order']);

Route::post('/add_order', [OrderController::class, 'addOrder']);


