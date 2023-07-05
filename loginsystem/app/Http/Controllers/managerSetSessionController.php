<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class managerSetSessionController extends Controller
{ 
    public function managerSetSession(Request $request){
        $data = $request->input('data');
        $request->session()->put('mAccount', $data['m_username']);

        return;
    }
}
