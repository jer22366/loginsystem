<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class mainPageShowDataController extends Controller
{
    public function managerShowData(Request $request){
        
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpmember', 'root', '');
        $statement = $pdo->prepare("SELECT m_name, m_username, m_password, m_sex, m_birthday, m_email, m_phone, m_level FROM memberdata");
        if ($statement !== false) {
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $rows) {
                $data[] = $rows; 
            }
            return $data;
        } else {
            return 'error';
        }
    }
} 