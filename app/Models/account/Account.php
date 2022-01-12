<?php

namespace App\Models\account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account.account';
    protected $fillable = ['availDt'];
    public $timestamps = false; 

    public function players(){
        return $this->hasMany('App\Models\player\Player', 'account_id')
        ->select('id', 'account_id', 'name', 'level' , 'job', 'last_play');
    }
}
