<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    function __construct(){

    }
    public function createGroup($groupName, $name)
    {

        $userId = $name . "_" . uniqid();
        $groupId = $groupName . "_" . uniqid();

        $link_ToCode = 'http://localhost:8080/join/'.$groupId;

        $nuovoUser = DB::table('user_table')->insert([
            'group_id' => $groupId,
            'user_id' => $userId,
            'nickname' => $name,
            'avatar' => '',
        ]);

        $nuovoGruppo = DB::table('group_table')->insert([
            'group_id' => $groupId,
            'group_name' => $groupName
        ]);

        // var_dump($nuovoUser,$nuovoGruppo);
        return ['group_id' => $groupId,'join_link' => $link_ToCode];
    }

    public function createUser($groupName, $name, $link_ToCode)
    {
        
    }
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
                'plate_code' => $key,
                'quantity' => $value,
            ]);
        }

        // dump($nuovoRecordId);

            $tableName = 'user_order_table';
            // $results = DB::connection()->table($tableName)->get()->groupBy('plate_code');

            $results = DB::table($tableName)
                        ->select('plate_code', DB::raw('SUM(quantity) as total_quantity'))
                        ->groupBy('plate_code')
                        ->get();



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
