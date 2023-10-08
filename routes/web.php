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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/group_details', function () {
    return view('group_details');
});

Route::get('/order', function () {
    return view('main');
});


Route::post('/manage_order', function (Request $request) {

    $data = $request->json()->all();

    // Creare un'istanza di OrderController
    $orderController = new OrderController();

    // Chiamare la funzione manageOrder sulla classe OrderController e passare $data come parametro
    $response = $orderController->manageOrder($data);
// dump($response, response()->json($response));
    return response()->json($response);
});


