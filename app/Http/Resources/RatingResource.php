<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return[
          'id'=>$this->user_id,
          'user'=>$this->user,
          'points'=>$this->TotalPoints,
          'count'=>$this->total,
          'perc'=>number_format((float)($this->TotalPoints/$this->total), 0, '.', '')
      ];
    }
}
