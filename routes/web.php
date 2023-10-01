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
    return view('main');
});


Route::post('/manage_order', function (Request $request) {

    $data = $request->json()->all();

    // Creare un'istanza di OrderController
    $orderController = new OrderController();

    // Chiamare la funzione manageOrder sulla classe OrderController e passare $data come parametro
    $response = $orderController->manageOrder($data);

    return response()->json(['message' => $response]);
});

// Route::post('/manage_order', function ($item) {
//     dd($item);
//     return view('main');
// });

// Route::get('/token', function (Request $request) {
//     $token = $request->session()->token();

//     $token = csrf_token();

//     // ...
// });

// Route::post('/manage_order', '\App\Http\Controllers\OrderController@manageOrder');

// Route::post('/manage_order', [OrderController::class, 'manageOrder']);
