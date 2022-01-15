<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        // return $kupon_log = kupon_log::first();
        
        return view('dashboard');
    }

    public function sales_static(){
        return view('layouts.sales_static'); 
    }

}
