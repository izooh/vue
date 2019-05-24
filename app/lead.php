<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
  protected $fillable = ['user_id', 'cfid', 'contact','last_name'];
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function remains()
  {
    return $this->belongsTo('App\remain','cfid','cfid');
  }
}
