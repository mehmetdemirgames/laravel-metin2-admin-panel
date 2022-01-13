<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\log\command_log;

class CommandController extends Controller
{
    public function index(){

        $command_log = command_log::orderByDesc('date')->paginate(10);

        return view('command.list', compact('command_log'));
    }
}
