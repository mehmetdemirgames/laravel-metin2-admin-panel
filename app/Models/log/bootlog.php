<?php

namespace App\Models\log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bootlog extends Model
{
    use HasFactory;
    protected $table = 'log.bootlog';
    protected $dates = ['time'];
    
}
