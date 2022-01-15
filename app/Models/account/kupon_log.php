<?php

namespace App\Models\account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class kupon_log extends Model
{
    use HasFactory;

    protected $table = 'account.kupon_log';
    protected $dates = ['tarih'];
    protected $appends = ['ItemciDaySales', 'ItemciTotalSales', 'KabasakalDaySales', 'KabasakalTotalSales'];

    public function getItemciDaySalesAttribute(){
        $itemci_day = kupon_log::where('site', 'itemci')->where('tarih', '>=', Carbon::today())->sum('tl_tutar');
        
        if($itemci_day)
        {
            $itemci_dayAttribute = $itemci_day - ($itemci_day * 10) / 100;
            return strval(round($itemci_dayAttribute));
        }
        return null;
    }

    public function getItemciTotalSalesAttribute(){
        $itemci_total = kupon_log::where('site', 'itemci')->sum('tl_tutar');
        
        if($itemci_total)
        {
            $itemci_totalAttribute = $itemci_total - ($itemci_total * 10) / 100;
            return strval(round($itemci_totalAttribute));
        }
        return null;
    }

    public function getKabasakalDaySalesAttribute(){
        $kabasakal_day = kupon_log::where('site', 'kabasakal')->where('tarih', '>=', Carbon::today())->sum('tl_tutar');
        
        if($kabasakal_day)
        {
            $kabasakal_dayAttribute = $kabasakal_day - ($kabasakal_day * 5) / 100;
            return strval(round($kabasakal_dayAttribute));
        }
        return null;
    }

    public function getKabasakalTotalSalesAttribute(){
        $kabasakal_total = kupon_log::where('site', 'kabasakal')->sum('tl_tutar');
        
        if($kabasakal_total)
        {
            $kabasakal_totalAttribute = $kabasakal_total - ($kabasakal_total * 5) / 100;
            return strval(round($kabasakal_totalAttribute));
        }
        return null;
    }

}
