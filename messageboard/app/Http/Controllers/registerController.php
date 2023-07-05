<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use PDO;

class registerController extends Controller
{
    public function accountregister(Request $request){

        $request->validate([
            'email' => [
                Rule::notIn(['']), // 禁用 Laravel 的郵件驗證功能
            ],
        ]);

        $account = $request -> input('Account');
        $password = $request -> input('Password');
        $name = $request -> input('Name');
        $sex = $request -> input('Sex');
        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');
        $email = $request -> input('Email');
        $phone = $request -> input('Phone');
        $level = '0';

        $currentYear = date("Y");
        if($currentYear - $year <=100 && $currentYear - $year >=0){
            if( $year % 4 == 0 && $year %100 != 0 && $year %400 == 0){
                if($month == 2){
                    if($day > 29 || $day < 1){
                        return '日期錯誤';
                    }
            }
            if ($month > 12 || $month < 1) {
                    return '月份錯誤';
                }else if($month%2 == 1 || $month == 8){
                    if($day > 31 || $day < 1){
                        return '日期錯誤';
                    }
                }else if($month % 2 == 0 && $month != 8){
                    if($day > 30 || $day < 1){
                        return '日期錯誤';
                    }
                }
            }
        }else{
            return '無效的年份';
        }
        $birthday = $year .'/'. $month .'/'. $day;

        $pattern = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
        if (!preg_match($pattern, $email)) {
            return "無效的email格式";
        } 
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpmember', 'root', '');
        $statement = $pdo -> prepare("INSERT INTO memberdata(m_name, m_username, m_password, m_sex, m_birthday, m_email, m_phone, m_level) VALUES 
                                   (?,?,?,?,?,?,?,?)");
        $statement -> execute([$name, $account, $password, $sex, $birthday, $email, $phone, $level]);

        return 'ok';
    }
}
