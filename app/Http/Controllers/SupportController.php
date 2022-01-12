<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test\new_ticket;
use App\Models\test\ticket_msg;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = new_ticket::paginate(10);
        return view('support.list', compact('tickets'));
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
    public function store(Request $request, $ticket_id)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
       $ticket_and_msg = new_ticket::find($ticket_id)->with('ticket_msg')->first();
       return view('support.show', compact('ticket_and_msg'));
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

    public function add_answer(Request $request, $ticket_id)
    {
        $answer = ticket_msg::insert([
            'ticket_id' => $ticket_id,
            'author' => 'Yönetici',
            'msg' => $request->get('msg'),
            'time' =>  $date = now()->format('Y-m-d H:i:s')
        ]);
        
        if($answer){
            return redirect()->back()->withSuccess('Tickete başarılı bir şekilde cevap verildi');
        }else{
            return redirect()->back()->withErrors('Tickete cevap verilirken bir hata oluştu');
        }
    }


    public function close($ticket_id)
    {
        $ticket = new_ticket::find($ticket_id) ?? abort('Ticket bulunamadı');
        new_ticket::find($ticket_id)->update([
            'open' => '0'
        ]);

        return redirect()->back()->withSuccess('Ticket kapatıldı');
    }

}
