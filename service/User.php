<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //one to Many relationship to Article Model
  public function article()
    {
      return $this->hasMany('App\Article');
    }

    //one to Many relationship to Loan Model
    public function loan()
    {
      return $this->hasMany('App\Loan');
    }

    //one to Many relationship to Call Model
    public function call()
    {
      return $this->hasMany('App\Call');
    }
}
