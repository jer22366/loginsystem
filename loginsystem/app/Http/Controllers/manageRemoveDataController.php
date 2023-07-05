<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class removeDataController extends Controller
{ 
    public function managerRemoveData(Request $request){
        $data = $request->input('data');

        $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpmember', 'root', '');
        $statement = $pdo -> prepare("DELETE FROM memberdata WHERE id = ?;");
        $statement-> execute([$data['id']]);
        return '已刪除';
    }
}