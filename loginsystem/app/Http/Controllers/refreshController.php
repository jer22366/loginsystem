<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class refreshController extends Controller
{
    public function refreshData(Request $request){
        
        $account = $request->input('account');
        $password = $request->input('password');
        $name = $request->input('name');
        $sex = $request->input('sex');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $acnt = $request->input('acnt');
        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');
        
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
        
        $sessionAcc = $request->session()->get('account');
        $sessionMAcc = $request->session()->get('mAccount');
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpmember', 'root', '');
    
        if($acnt == 0){
                $statement = $pdo->prepare("UPDATE memberdata SET m_name = ?, m_username = ?, m_password = ?, m_sex = ?, m_birthday = ?, m_email = ?, m_phone = ? WHERE m_username = ?");//修改資料
            if ($statement !== false) {
                $statement->execute([$name, $account, $password, $sex, $birthday, $email, $phone, $sessionAcc]);
                return 'ok';
            } else {
                // 處理查詢失敗的情況
                return 'error';
            }
        }else{
            $statement = $pdo->prepare("UPDATE memberdata SET m_name = ?, m_username = ?, m_password = ?, m_sex = ?, m_birthday = ?, m_email = ?, m_phone = ? WHERE m_username = ?");//修改資料
            if ($statement !== false) {
                $statement->execute([$name, $account, $password, $sex, $birthday, $email, $phone, $sessionMAcc]);
                return 'ok';
            } else {
                // 處理查詢失敗的情況
                return 'error';
            }
        }
    }
}
