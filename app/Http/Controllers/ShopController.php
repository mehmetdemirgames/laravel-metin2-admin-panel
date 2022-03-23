<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player\log_market;
use App\Models\account\account;
use App\Models\player\player;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logmarket = log_market::select('item_kod', log_market::raw('SUM(count) as toplam'))
        ->groupBy('item_kod')
        ->orderByDesc('toplam')
        ->paginate(10) ?? abort(404, 'log bulunamadı');

        return view('shop.list', compact('logmarket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function SendCash(){
        return view('shop.sendcash');
    }

    public function updateCash(Request $request)
    {
        $request->validate([
            'accountType' => ['required'],
            'NickOrLogin' => ['required'],
            'cashType' => ['required'],
            'count' => ['required', 'numeric']
        ]);

        if($request->accountType == 'account_login'){
            
           $account = Account::select('id', 'login', 'cash', 'coins')->where('login', $request->get('NickOrLogin'))->first();

            if($account){
                    if($request->cashType == 'ep'){
                    $CashCount = $account->cash;
                    $HowAddCash = $request->get('count') + $CashCount;
                    $update = Account::where('login', $request->get('NickOrLogin'))->update(['cash' => $HowAddCash]);

                    if($update){
                        return redirect()->back()->withSuccess('Ep gönderimi başarıyla sağlandı.');
                    }
                    else{
                    return redirect()->back()->WithErrors('Hata oluştu.');
                    }
                }
                elseif($request->cashType == 'mp'){
                    $CoinsCount = $account->coins;
                    $HowAddCoins = $request->get('count') + $CoinsCount;
                    $update = Account::where('login', $request->get('NickOrLogin'))->update(['coins' => $HowAddCoins]);

                    if($update){
                        return redirect()->back()->withSuccess('Mp gönderimi başarıyla sağlandı');
                    }
                    else{
                        return redirect()->back()->WithErrors('Hata oluştu.');
                    }
                }
            }else{
                return redirect()->back()->WithErrors('Böyle bir üyelik bulunamadı.');
            }

        }

        elseif($request->accountType == 'player_name'){
            $player = Player::with('account')
            ->where('name', $request->get('NickOrLogin'))
            ->first();
            
            if($player){
                if($request->cashType == 'ep')
                {
                    $CashCount = $player->account->cash;
                    $HowAddCash = $request->get('count') + $CashCount;
                    $update = Account::where('id', $player->account_id)->update(['cash' => $HowAddCash]);

                    if($update){
                        return redirect()->back()->withSuccess('Ep gönderimi başarıyla sağlandı.');
                    }
                    else
                    {
                        return redirect()->back()->WithErrors('Hata oluştu.');
                    }
                }
                elseif($request->cashType == 'mp'){
                    $CoinsCount = $player->account->coins;
                    $HowAddCoins = $request->get('count') + $CoinsCount;
                    $update = Account::where('id', $player->account_id)->update(['coins' => $HowAddCoins]);

                    if($update){
                        return redirect()->back()->withSuccess('Mp gönderimi başarıyla sağlandı');
                    }
                    else{
                    return redirect()->back()->WithErrors('Hata oluştu.');
                    }
                }
            }
            else{
                return redirect()->back()->WithErrors('Oyuncu bulunamadı.');
            }

        }
    }

}
