<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $fillable = [
        'user_id', 'cfid', 'contact','last_name','insert_date'
    ];

}
