<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player\Player;
use Illuminate\Support\Str;
use App\Models\account\Account;
use Illuminate\Support\Facades\Cache;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $player = Player::select('id', 'account_id', 'name', 'level' , 'job', 'last_play')->with('account', 'guild_member');

        if(request()->get('name')){
           $player = $player->where('name', 'LIKE', "%".request()->get('name')."%");
        }
        if(request()->get('ip')){
           $player = $player->where('ip', request()->get('ip'));
        }
        if(request()->get('gold')){
           $player = $player->where('gold', request()->get('gold'));
        }
        $player = $player->paginate(10);

        return view('player.list', compact('player'));
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
    public function edit($name)
    {
        $player = Player::where('name', $name)->first() ?? abort(404, 'Karakter bulunamadı');
        return view('player.edit', compact('player'));
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
        $player = Player::find($id) ?? abort(404, 'Karakter Bulunamadı');
        Player::find($id)->update($request->except(['_token','_method']));
        return redirect()->route('player.index')->withSuccess('Karakter başarıyla güncellendi');
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


}
