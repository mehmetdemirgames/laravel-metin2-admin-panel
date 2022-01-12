<?php

namespace App\Models\player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\player\Player;

class guild extends Model
{
    use HasFactory;

    protected $table = 'player.guild';
    protected $appends = ['Player'];


    public function guild_members(){
        return $this->hasMany('App\Models\player\guild_member', 'guild_id');
    }

    public function getPlayerAttribute(){
        $player = Player::select('name', 'level', 'last_play', 'job', 'account_id')->find($this->guild_members()->get('pid'));
        if($player)
        {
            return $player;
        }
        return null;

    }

}
