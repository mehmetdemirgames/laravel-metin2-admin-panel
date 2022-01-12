<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account\Account;
use App\Models\account\ban_hwd;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $account = Account::limit(50);

        if(request()->get('login')){
           $account = $account->where('login', 'LIKE', "%".request()->get('login')."%");
        }
        if(request()->get('email')){
           $account = $account->where('email', 'LIKE', "%".request()->get('email')."%");
        }
        if(request()->get('phone1')){
           $account = $account->where('phone1', 'LIKE', "%".request()->get('phone1')."%");
        }
        if(request()->get('hwid')){
           $account = $account->where('hwid', request()->get('hwid'));
        }
        if(request()->get('machine_guid')){
           $account = $account->where('last_machine_guid', request()->get('machine_guid'));
        }

        $account = $account->paginate(10);

        return view('account.list', compact('account'));
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
    public function show($login)
    {
        return $account = Account::where('login', $login)->with('players')->first();
        
        return view('account.list', compact('account'));
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

    public function action($account_id)
    {
        $account = Account::whereId($account_id)->with('players')->first();
        return view('account.action', compact('account'));
    }

    public function transactions(Request $request, $account_id){

        if($request->get('ban_time')){
            $ban_time_list = ['1 Saat' => '3600', '12 Saat' => '43200', '1 Gün' => '86400', '3 Gün' => '259200', '7 Gün' => '604800', '15 Gün' => '1296000', '30 Gün' => '2592000'];
            $date = now()->addSeconds($ban_time_list[$request->input('ban_time')])->format('Y-m-d H:i:s');;
        }
        
        //return $request->get('ban_time');
        if($request->ban_type == 'Hesap Ban'){

            Account::find($account_id)->update([
                'availDt' => $date
            ]) ?? abort(404, 'Hesap bulunamadı');
            
            return redirect()->route('account.index')->withSuccess('Hesap banlama işlemi gerçekleşti');
        }

        elseif($request->ban_type == 'Mac Ban'){
            $account = Account::whereId($account_id)->select('id', 'login', 'hwid', 'last_machine_guid')->first() ?? abort(404, 'Hesap bulunamadı');
            $mac_ban = ban_hwd::insert([
                'login' => $account->login,
                'hwid' => $account->hwid,
                'machine_guid' => $account->last_machine_guid
            ]) ?? abort(404, 'Hesap bulunamadı');
            
            if($mac_ban){
                return redirect()->route('account.index')->withSuccess('Mac ban başarılı bir şekilde gerçekleşti.');
            }else{
                return redirect()->route('account.index')->withErrors('Mac ban işlemi başarısız oldu.');
            }

        }
        elseif($request->ban_type == 'Chat Ban'){
            
        }
        elseif($request->ban_type == 'Ban Aç'){
            Account::find($account_id)->update([
                'availDt' => '0000-00-00 00:00:00'
            ]) ?? abort(404, 'Hesap bulunamadı');
            
            return redirect()->route('account.index')->withSuccess('Hesap banı kaldırıldı.');
        }
        elseif($request->ban_type == 'Mac Ban Aç'){
            $account = Account::whereId($account_id)->select('id', 'login')->first() ?? abort(404, 'Hesap bulunamadı');
            $mac_ban = ban_hwd::where('login', $account->login) ?? abort(404, 'Hesap bulunamadı');;
            $mac_ban->delete();
            return redirect()->route('account.index')->withSuccess('Hesap mac banı açıldı.');
        }

        return $request->all();
    }
}
