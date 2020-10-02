<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amentities extends Model
{
    //

    protected $table = 'amentities';
    public function project(){
  
       
        return $this->belongsTo(Project::class);


    }
}
