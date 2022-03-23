<?php

namespace App\Models\account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\account\paywant_log;
use Illuminate\Support\Facades\Cache;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account.account';
    protected $fillable = ['availDt'];
    protected $appends = ['AccountSales'];
    public $timestamps = false; 
    
    public function players(){
        return $this->hasMany('App\Models\player\Player', 'account_id')
        ->select('id', 'account_id', 'name', 'level' , 'job', 'last_play');
    }
    public function paywantsales()
    {
        return $this->hasMany('App\Models\account\paywant_log', 'order_user_id');
    }
    public function couponsales()
    {
        return $this->hasMany('App\Models\account\kupon_log', 'kim');
    }

    public function getAccountSalesAttribute(){
        $accountsales = 0; 
        foreach($this->paywantsales()->get() as $paywant_sell){
            $accountsales += $paywant_sell->order_profit;
        }

        foreach($this->couponsales()->get() as $coupon_sell){
            $accountsales += $coupon_sell->tl_tutar;
        }
        return round($accountsales);
      
    }



}
