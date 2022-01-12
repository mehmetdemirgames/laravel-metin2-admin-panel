<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player\Guild;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guild = Guild::select('name', 'level', 'lider', 'bayrak');

        if(request()->get('guild_name')){
           $guild = $guild->where('name', 'LIKE', "%".request()->get('guild_name')."%");
        }
        if(request()->get('guild_leader')){
           $guild = $guild->where('lider', 'LIKE', "%".request()->get('guild_leader')."%");
        }

        $guild = $guild->paginate(10) ?? abort(404, 'Lonca bulunamadı');



        return view('guild.list', compact('guild'));
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
    public function show($guild_name)
    {
        $guild = Guild::whereName($guild_name)->with('guild_members')->first();
        return view('guild.show', compact('guild'));
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
}
