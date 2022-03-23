<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account\paywant_log;

class MainController extends Controller
{
    public function dashboard()
    {
        // $refferal = Account::select('ref', Account::raw('count(*) as total'))
        // ->groupBy('ref')
        // ->orderByDesc('total')
        // ->paginate(15);

        // $paywant_log = paywant_log::select(paywant_log::raw('DATE_FORMAT(date, "%d-%b-%Y") as date2'), paywant_log::raw('sum(order_profit) as daily'))
        // ->groupBy('date2')
        // ->orderByDesc('daily')
        // ->get();

        // return $paywant_log;
        
        return view('dashboard');
    }

    public function sales_static(){
        return view('layouts.sales_static'); 
    }

}
