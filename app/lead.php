<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class lead extends Model
{
  use LogsActivity;
  protected static $logAttributes = ['user_id', 'cfid','contact','last_name','status'];
  protected $fillable = ['user_id', 'cfid', 'contact','last_name','status'];
  protected static $logName = 'history';
  protected static $recordEvents = ['updated'];
    public function user()
    {
      return $this->belongsTo('App\User','user_id','s_id');
    }

  public function remains()
  {
    return $this->belongsTo('App\remain','cfid','cfid');
  }
  public function promise()
   {
       return $this->hasMany('App\Promise','contact','contact');
   }
}
