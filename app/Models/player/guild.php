<?php

namespace App\Models\player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\player\Player;
use App\Models\account\account;
use Illuminate\Support\Facades\Cache;

class guild extends Model
{
    use HasFactory;

    protected $table = 'player.guild';
    protected $appends = ['GuildSales', 'GuildPlayers'];

    public function guild_members(){
        return $this->hasMany('App\Models\player\guild_member', 'guild_id');
    }

    public function getGuildPlayersAttribute(){
       
    $player = Player::select('name', 'level', 'last_play', 'job', 'account_id')->with('account')->find($this->guild_members()->get('pid'));
    if($player)
    {
        return $player;
    }
    return null;
        
    }

    public function getGuildSalesAttribute(){
        $guild_sales = 0;
        foreach($this->getGuildPlayersAttribute() as $p){
                $guild_sales += $p->account->AccountSales;
            }
        
        return round($guild_sales);
        
    }


}
