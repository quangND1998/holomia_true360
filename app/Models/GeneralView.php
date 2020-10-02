<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralView extends Model
{

    protected $table = 'general_view';
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    

    public function model_ar(){
     
            return $this->hasMany(ModelAR::class);

    }
}
