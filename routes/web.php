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

Route::get('/group_details/{group}/{name}', function ($groupName, $name) {

    $orderController = new OrderController();

    $response = $orderController->createGroup($groupName, $name);

    return view('group_details', $response);
});

Route::get('/join/{group_id}/{user_id}', function ($group_id, $user_id) {

    return view('main',['group_id'=> $group_id, 'user_id' => $user_id]);
});
//     return view('group_details');
// });

Route::post('/add_order', function (Request $request) {

    $data = $request->json()->all();

    $orderController = new OrderController();

    $response = $orderController->addOrder($data);

    return response()->json($response);
});


