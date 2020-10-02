<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoProject extends Model
{
    protected $table ='info_project';


    protected $fillable = [
       'id', 'project_id', 'logo', 'thumbnail', 'phone', 'link_register','link_film'
    ];



    public function project(){
       
            return $this->belongsTo(Project::class);
    
    }
}
