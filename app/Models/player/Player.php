<?php

namespace App\Models\player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Player extends Model
{
    use HasFactory;

    protected $table = 'player.player';
    protected $dates = ['last_play'];
    protected $fillable = ['name'];

    public function getLastPlayAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }
    
    public function account(){
        return $this->belongsTo('App\Models\account\Account');
    }
}
