<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account\kupon_log;
use Carbon\Carbon;

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
