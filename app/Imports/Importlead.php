<?php

namespace App\Imports;

use App\lead;
use Maatwebsite\Excel\Concerns\ToModel;

class Importlead implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new lead([
          'user_id'=> @$row[0],
          'cfid'    => @$row[1],
          'contact'    => @$row[2],
          'last_name'    => @$row[3]
        ]);
    }
}
