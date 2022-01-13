<?php

namespace App\Models\log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class command_log extends Model
{
    use HasFactory;
    protected $table = 'log.command_log';
    protected $dates = ['date'];
    
}
