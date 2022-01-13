<?php

namespace App\Models\account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ep_kupon extends Model
{
    use HasFactory;

    protected $table = 'account.ep_kupon';
    protected $dates = ['acilma_tarihi'];

}
