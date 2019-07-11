<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    //
    public function lead()
   {
       return $this->belongsTo('App\lead','contact','contact');
   }
}
