<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class getDataController extends Controller
{ 
    public function getData(Request $request){

        $accountValue = $request->session()->get('account');
        $passwordValue = $request->session()->get('password');
        $levelValue = $request->session()->get('level');
        $mAccountValue = $request->session()->get('mAccount');

        $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpmember', 'root', '');
        if($levelValue == 0){
            $statement = $pdo -> prepare("SELECT * FROM memberdata where m_username= ? and m_password= ?");
            $statement -> execute([$accountValue, $passwordValue]);
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $statement = $pdo -> prepare("SELECT * FROM memberdata where m_username= ?");
            $statement -> execute([$mAccountValue]);
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        
    }
}
