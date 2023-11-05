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

        $groupId = str_replace(" ", "", $groupName) . "_" . uniqid();

        $userId = $this->createUser($groupId, $name);

        DB::table('group_table')->insert([
            'group_id' => $groupId,
            'group_name' => $groupName
        ]);


        $link_ToCode = 'http://localhost:8080/join/'.$groupId.'/'.$userId;

        return ['group_name' => $groupName,'join_link' => $link_ToCode, 'group_id' => $groupId, 'user_id' => $userId];
    }

    public function createUser($groupId, $name)
    {
        $userId = $name . "_" . uniqid();

        DB::table('user_table')->insert([
            'user_id' => $userId,
            'group_id' => $groupId,
            'nickname' => $name
        ]);
        return $userId;
    }

    public function addOrder($data)
    {
        $order = isset($data['order']) ? $data['order'] : [];
        $groupId = $data['group_id'];
        $tableName = 'user_order_table';

        foreach ($order as $key => $value){
            // Puoi anche utilizzare il metodo `insertGetId` per ottenere l'ID del record appena inserito
            DB::table($tableName)->insert([
                'user_id' => $data['user_id'],
                'group_id' => $data['group_id'],
                'plate_code' => $key,
                'quantity' => $value,
            ]);
        }


        $results = DB::table($tableName)
                    ->select('plate_code', DB::raw('SUM(quantity) as total_quantity'))
                    ->where('group_id', $groupId)
                    ->groupBy('plate_code')
                    ->get();


        return $results;
    }

}
