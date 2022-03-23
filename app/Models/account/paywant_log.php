<?php

namespace App\Models\account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class paywant_log extends Model
{
    use HasFactory;
    protected $table = 'account.paywant_log';
    // protected $appends = ['PaywantTotalSales', 'PaywantDaySales'];
    protected $dates = ['date'];

    // public function getPaywantTotalSalesAttribute(){
    //     $paywant_total = paywant_log::sum('order_profit');
    //     if($paywant_total)
    //     {
    //         return strval(round($paywant_total));
    //     }
    //     return null;
    // }

    // public function getPaywantDaySalesAttribute(){
    //     $paywant_gunluk = paywant_log::where('date', '>=', Carbon::today())->sum('order_profit');
    //     if($paywant_gunluk)
    //     {
    //         return strval(round($paywant_gunluk));
    //     }
    //     return null;
    // }


}
