<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player\Guild;
use Illuminate\Support\Facades\Cache;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentPage = request()->get('page',1);
        $guildname = request()->get('guild_name',1);
        $guild_leader = request()->get('guild_leader',1);
        // asd 

        $guild = Cache::remember('guild_list'. $currentPage . $guildname . $guild_leader, 3600, function () {
            
        // $guild_list = Guild::select('id','name', 'level', 'lider', 'bayrak')->limit(5);
        $guild_list = Guild::select('id','name', 'level', 'lider', 'bayrak');
        
        if(request()->get('guild_name')){
            $guild_list = $guild_list->where('name', 'LIKE', "%".request()->get('guild_name')."%");
        }
        if(request()->get('guild_leader')){
            $guild_list = $guild_list->where('lider', 'LIKE', "%".request()->get('guild_leader')."%");
        }

        // $all = $guild_list->get()->sortByDesc('GuildSales');

        $guild_list = $guild_list->paginate(5) ?? abort(404, 'Lonca bulunamadı');
        return $guild_list;
        // $all = $guild_list->get()->sortByDesc('GuildSales');
		// return $all;              
        });

        
        // return $guild;
        return view('guild.list',compact('guild'));

        // return view('guild.list', compact('guild'));
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
        $guild = Guild::whereName($guild_name)->first();
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
