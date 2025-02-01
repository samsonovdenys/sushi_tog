<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    // To do:
    // Ora funziona tutto bene, bisogna
    // string to lower per user_id e group_id

    public function group(){
        return view('group');
    }

    public function creteGroup($group_name){
        // Create group_id from group_name
        // Return 'details' page with group_id and group_name and join link and barcode.
        $groupName = $group_name;
        $groupId = $this->makeUnique(str_replace(" ", "_", strtolower($groupName)));
        $joinLink = 'http://localhost:8080/join/'.$groupId;

        DB::table('group_table')->insert([
            'group_id' => $groupId,
            'group_name' => $groupName
        ]);

        session([
            'group_id' => $groupId,
            'group_name'=> $groupName,
            'join_link' => $joinLink
        ]);

        return view('details',[
            'group_id' => $groupId,
            'group_name' => $groupName,
            'join_link' => $joinLink
        ]);
    }

    public function join($group_id){
        // Prende il nome del gruppo dal DB
        // Return 'details' page with group_id and group_name and join link and barcode.
        $groupName = DB::table('group_table')
                            ->select('group_name')
                            ->where('group_id', $group_id)
                            ->get();

        $groupName = $groupName[0]->group_name;
        $joinLink = 'http://localhost:8080/join/'.$group_id;

        session([
            'group_id' => $group_id,
            'group_name'=> $groupName,
            'join_link' => $joinLink
        ]);

        return view('details',[
            'group_id' => $group_id,
            'group_name' => $groupName,
            'join_link' => $joinLink
        ]);
    }

    public function order($user_name){
        // Creo user_id dal user_name
        // Ritorno group_id, group_name, user_id, user_name, join_link, avatar

        $userId = $this->makeUnique(str_replace(" ", "_", strtolower($user_name)));

        session([
            'user_id' => $userId,
            'user_name' => $user_name
        ]);

        return view('order', [
            'group_id' => session('group_id'),
            'group_name' => session('group_name'),
            'user_id' => $userId,
            'user_name' => $user_name,
            'join_link' => session('join_link')]);
    }

    public function addOrder(Request $request){

        $data = $request->json()->all();

        $order = isset($data['order']) ? $data['order'] : [];
        $order_number = isset($data['order_number']) ? $data['order_number'] : 1;

        $tableName = 'order_table';

        foreach ($order as $key => $value){
            // Puoi anche utilizzare il metodo `insertGetId` per ottenere l'ID del record appena inserito
            DB::table($tableName)->insert([
                'group_id' => session('group_id'),
                'user_id' => session('user_id'),
                'user_name' => session('user_name'),
                'plate_code' => $key,
                'quantity' => $value,
                'order_number' => $order_number
            ]);
        }


        $collection = DB::table($tableName)
                    ->select('plate_code', 'user_name', DB::raw('SUM(quantity) as total_quantity'))
                    ->where('group_id', session('group_id'))
                    ->where('order_number', $order_number)
                    ->groupBy('plate_code', 'user_name')
                    ->get();

        $results = [];

        foreach ($collection as $item) {
            $plateCode = $item->plate_code;
            $userName = $item->user_name;
            $quantity = (int) $item->total_quantity;

            if (!isset($results[$plateCode])) {
                $results[$plateCode] = [
                    'total' => 0,
                    'details' => []
                ];
            }

            $results[$plateCode]['total'] += $quantity;

            if (!isset($results[$plateCode]['details'][$userName])) {
                $results[$plateCode]['details'][$userName] = 0;
            }

            $results[$plateCode]['details'][$userName] += $quantity;
        }

        // dd($results);
        return response()->json($results);
    }

    public function makeUnique($name){
        return $name . "_" . uniqid();
    }


}
