<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

use App\Models\account\Account;
use App\Models\player\Player;
use App\Models\player\offlineshop_shops;
use App\Models\test\new_ticket;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if(Cache::get('__online_count')){
            $online_count = Cache::get('__online_count');
        } else {
            $online_count = Player::where('last_play', '>=', Carbon::today()->subMinute(7))->count();
            Cache::put('__online_count', $online_count, 120);
        }

        if(Cache::get('__account_count')){
            $account_count = Cache::get('__account_count');
        } else {
            $account_count = Account::count();
            Cache::put('__account_count', $account_count, 120);
        }

        if(Cache::get('__player_count')){
            $player_count = Cache::get('__player_count');
        } else {
            $player_count = Player::count();
            Cache::put('__player_count', $player_count, 120);
        }

        if(Cache::get('__block_account_count')){
            $block_account_count = Cache::get('__block_account_count');
        } else {
            $block_account_count = Account::where('status', '=', 'BLOCK')->count();
            Cache::put('__block_account_count', $block_account_count, 120);
        }

        if(Cache::get('__active_shops')){
            $active_shops = Cache::get('__active_shops');
        } else {
            $active_shops = offlineshop_shops::count();
            Cache::put('__active_shops', $active_shops, 120);
        }

        if(Cache::get('__unanswered_ticket')){
            $unanswered_ticket = Cache::get('__unanswered_ticket');
        } else {
            $unanswered_ticket = new_ticket::where('open', '1')->count();
            Cache::put('__unanswered_ticket', $unanswered_ticket, 120);
        }

        View::share('__online_count', $online_count);
        View::share('__account_count', $account_count);
        View::share('__player_count', $player_count);
        View::share('__block_account_count', $block_account_count);
        View::share('__active_shops', $active_shops);
        View::share('__unanswered_ticket', $unanswered_ticket);

    }
}
