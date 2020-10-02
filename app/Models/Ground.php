<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    protected $table = 'ground';

    public function subdivision(){
        return $this->belongTo(SubdivisionView::class);
    }
}
