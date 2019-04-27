<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  protected $fillable = [
      'user_id','Totals','Opening','Verification','Closing','Understanding','Probing','Negotiation','Product_Knowledge','Urgency','Commitment','Handling_Efficiency','Empathy','Language','Timeliness','Listening','First_Contact_Resolution','Call_Controlling'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
