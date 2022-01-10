<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account\Account;
use App\Models\player\Player;
use App\Models\player\offlineshop_shops;
use Carbon\Carbon;

class MainController extends Controller
{
    public function dashboard()
    {
        $account_count = Account::count();
        $player_count = Player::count();
        $block_account_count = Account::where('status', '=', 'BLOCK')->count();
        $active_shops = offlineshop_shops::count();
        //return $ldate = date('Y-m-d H:i:s');
        $online_count_sql = Player::where('last_play', '>=', Carbon::today()->subMinute(7))->count();
        return view('dashboard', compact('account_count', 'player_count', 'block_account_count', 'active_shops', 'online_count_sql'));
    }
}
