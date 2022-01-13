<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account\account;

class RefferalController extends Controller
{
    public function index()
    {

        $refferal = Account::select('ref', Account::raw('count(*) as total'))
        ->groupBy('ref')
        ->orderByDesc('total')
        ->paginate(15);

        return view('refferal.list', compact('refferal'));

    }
}
