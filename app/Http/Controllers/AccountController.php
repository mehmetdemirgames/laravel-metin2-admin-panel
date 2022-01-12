<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account\Account;
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
        return $account = Account::limit(50)->get();
        
        if(request()->get('name')){
            $account = $account->where('name', 'LIKE', "%".request()->get('name')."%");
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
            ]);
            
            return redirect()->route('account.index')->withSuccess('Hesap banlama işlemi gerçekleşti');
        }
        elseif($request->ban_type == 'Mac Ban'){
            
        }
        elseif($request->ban_type == 'Chat Ban'){
            
        }
        elseif($request->ban_type == 'Ban Aç'){
            
        }
        elseif($request->ban_type == 'Mac Ban Aç'){
            
        }

        return $request->all();
    }
}
