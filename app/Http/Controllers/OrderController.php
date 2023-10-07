<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function manageOrder($data)
    {

        // Connessione al database predefinito
        $connection = DB::connection();

        // Esempio di esecuzione di una query
        // $results = $connection->select('select * from user_order_table');
        // Puoi anche utilizzare il metodo `table` per selezionare una tabella specifica


        foreach ($data as $key => $value){
            // Puoi anche utilizzare il metodo `insertGetId` per ottenere l'ID del record appena inserito
            $nuovoRecordId = DB::table('user_order_table')->insertGetId([
                'group_id' => '12',
                'user_id' => '1231345',
                'order_id' => '222',
                'plate_code' => $key,
                'notes' => '',
                'quantity' => $value,
            ]);
        }

        // dump($nuovoRecordId);

                $tableName = 'user_order_table';
            $results = DB::connection()->table($tableName)->get();



        // You can now work with the data as needed
        // For example, you can access specific fields from the JSON data:
        // $orderId = $data['orderId'];
        // $productName = $data['productName'];
        // $quantity = $data['quantity'];

        // Perform your desired actions with the data

        // Return a response (optional)
        return $results;
    }
}
