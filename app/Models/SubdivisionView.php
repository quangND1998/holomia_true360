<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubdivisionView extends Model
{


    protected $table = 'subdivision_view';
    public function project(){
      
        return $this->belongsTo(Project::class);

    }

    public function ground(){
        return $this->hasMany(Ground::class);
     
    }

}
