<?php

namespace App\Models\player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\player\guild;

class Player extends Model
{
    use HasFactory;

    protected $table = 'player.player';
    protected $dates = ['last_play'];
    protected $fillable = ['name'];
    //protected $guarded = ['id'];
    protected $appends = ['Guild'];
    
    public $timestamps = false; 

    public function getLastPlayAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }
    
    public function account(){
        return $this->belongsTo('App\Models\account\Account');
    }

    public function guild_member(){
        return $this->hasOne('App\Models\player\guild_member', 'pid');
    }

    public function getGuildAttribute(){
        $guild = Guild::select('name')->find($this->guild_member()->get('guild_id'))->first();
        if($guild)
        {
            return $guild;
        }
        return null;
    }   

}
