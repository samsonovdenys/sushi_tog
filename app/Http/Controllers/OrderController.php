<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manageOrder(Request $request)
    {
        // Retrieve the JSON data from the request body
        $data = $request->json()->all();

        // You can now work with the data as needed
        // For example, you can access specific fields from the JSON data:
        // $orderId = $data['orderId'];
        // $productName = $data['productName'];
        // $quantity = $data['quantity'];

        dd($data);
        // Perform your desired actions with the data

        // Return a response (optional)
        return response()->json(['message' => 'Order data received successfully']);
    }
}
