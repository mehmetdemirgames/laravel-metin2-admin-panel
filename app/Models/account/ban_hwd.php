<?php

namespace App\Models\account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ban_hwd extends Model
{
    use HasFactory;

    protected $table = 'account.ban_hwd';
    protected $fillable = ['login', 'hwid', 'machine_guid'];
    public $timestamps = false; 
}
