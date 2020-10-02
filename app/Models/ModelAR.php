<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAR extends Model
{   
    protected $table = 'model_ar';
        public function general(){
            return $this->belongTo(GeneralView::class);
        }
}
