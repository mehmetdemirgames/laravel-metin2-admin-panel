<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player\Player;
use Illuminate\Support\Str;

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

        if(Str::length(request()->get('name')) < 2){
            return 'Karakter adını daha tanımlayıcı girin.';
        }
        else{
            $player = $player->where('name', 'LIKE', "%".request()->get('name')."%");
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
        return view('player.edit');
        return Player::where('name', $name)->first() ?? abort(404, 'Karakter bulunamadı');
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
}
