<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class accountloginController extends Controller
{
    public function accountlogin(Request $request){
        $account = $request->input('account');
        $password = $request->input('password');
        $request->session()->put('account', $account);
        $request->session()->put('password', $password);
        
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpmember', 'root', '');
        $statement = $pdo -> prepare("SELECT m_username,m_password,m_level FROM memberdata where m_username=?");
        $statement -> execute([$account]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($rows)){
            $request->session()->put('level', $rows[0]['m_level']);
            if($rows[0]['m_username'] == $account && $rows[0]['m_password'] == $password){//判斷帳號密碼是否跟資料庫一樣
                if($rows[0]['m_level'] == 1){//判斷帳號是否為管理者帳號 如果是一般帳號回傳1 管理者帳號回傳2
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return '帳號密碼錯誤';
            }
        }else{
            return '帳號不存在';
        } 
    }
}
