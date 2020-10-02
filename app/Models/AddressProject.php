<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressProject extends Model
{
    
    protected $table = 'address_project';
    // protected $fillable = ['dob', 'bio', 'facebook', 'twitter', 'github'];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
