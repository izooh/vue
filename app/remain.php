<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class remain extends Model
{
    protected $fillable = ['user_id', 'cfid', 'contact','last_name'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
