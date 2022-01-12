<?php

namespace App\Models\test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class new_ticket extends Model
{
    use HasFactory;

    protected $table = 'test.new_ticket';
    protected $dates = ['last_msg'];
    protected $fillable = ['open'];
    public $timestamps = false;

    public function ticket_msg(){
        return $this->hasMany('App\Models\test\ticket_msg', 'ticket_id');
    }

}
