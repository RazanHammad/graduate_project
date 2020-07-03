<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class web_server_roles extends Model
{
    //
    protected $fillable = ['msg'];
     protected $casts = [
        'content' => 'array'
    ];
}
