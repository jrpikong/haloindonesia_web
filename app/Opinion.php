<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{

    protected $fillable = [
        'users_id','hashtag', 'message'
    ];
}
