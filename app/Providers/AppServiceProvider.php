<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

use App\Models\account\Account;
use App\Models\account\paywant_log;
use App\Models\account\kupon_log;
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
            Cache::put('__online_count', $online_count, 300);
        }

        if(Cache::get('__account_count')){
            $account_count = Cache::get('__account_count');
        } else {
            $account_count = Account::count();
            Cache::put('__account_count', $account_count, 300);
        }

        if(Cache::get('__player_count')){
            $player_count = Cache::get('__player_count');
        } else {
            $player_count = Player::count();
            Cache::put('__player_count', $player_count, 300);
        }

        if(Cache::get('__block_account_count')){
            $block_account_count = Cache::get('__block_account_count');
        } else {
            $block_account_count = Account::where('status', '=', 'BLOCK')->count();
            Cache::put('__block_account_count', $block_account_count, 300);
        }

        if(Cache::get('__active_shops')){
            $active_shops = Cache::get('__active_shops');
        } else {
            $active_shops = offlineshop_shops::count();
            Cache::put('__active_shops', $active_shops, 300);
        }

        if(Cache::get('__unanswered_ticket')){
            $unanswered_ticket = Cache::get('__unanswered_ticket');
        } else {
            $unanswered_ticket = new_ticket::where('open', '1')->count();
            Cache::put('__unanswered_ticket', $unanswered_ticket, 120);
        }

        if(Cache::get('__paywant_sales')){
            $paywant = Cache::get('__paywant_sales');
        } else {
            $paywant = paywant_log::first();
            Cache::put('__paywant_sales', $paywant, 10);
        }

        if(Cache::get('__coupon_sales')){
            $coupon = Cache::get('__coupon_sales');
        } else {
            $coupon = kupon_log::first();
            Cache::put('__coupon_sales', $coupon, 10);
        }

        if(Cache::get('__total_sales')){
            $total_sales = Cache::get('__total_sales');
        } else {
            $paywant_total = paywant_log::sum('order_profit');
            $itemci_total = kupon_log::where('site', 'itemci')->sum('tl_tutar');
            $kabasakal_total = kupon_log::where('site', 'kabasakal')->sum('tl_tutar');
            $itemci_totalAttribute = $itemci_total - ($itemci_total * 10) / 100;
            $kabasakal_totalAttribute = $kabasakal_total - ($kabasakal_total * 5) / 100;
            $total_sales = round($paywant_total + $itemci_totalAttribute + $kabasakal_totalAttribute);
            Cache::put('__total_sales', $total_sales, 10);
        }

        if(Cache::get('__total_day_sales')){
            $total_day_sales = Cache::get('__total_day_sales');
        } else {
            $paywant_gunluk = paywant_log::where('date', '>=', Carbon::today())->sum('order_profit');
            $itemci_day = kupon_log::where('site', 'itemci')->where('tarih', '>=', Carbon::today())->sum('tl_tutar');
            $kabasakal_day = kupon_log::where('site', 'kabasakal')->where('tarih', '>=', Carbon::today())->sum('tl_tutar');
            $itemci_dayAttribute = $itemci_day - ($itemci_day * 10) / 100;
            $kabasakal_dayAttribute = $kabasakal_day - ($kabasakal_day * 5) / 100;
            $total_day_sales = round($paywant_gunluk + $itemci_dayAttribute + $kabasakal_dayAttribute);
            Cache::put('__total_day_sales', $total_day_sales, 10);
        }

        View::share('__online_count', $online_count);
        View::share('__account_count', $account_count);
        View::share('__player_count', $player_count);
        View::share('__block_account_count', $block_account_count);
        View::share('__active_shops', $active_shops);
        View::share('__unanswered_ticket', $unanswered_ticket);
        View::share('__paywant_sales', $paywant);
        View::share('__coupon_sales', $coupon);
        View::share('__total_sales', $total_sales);
        View::share('__total_day_sales', $total_day_sales);

    }
}
