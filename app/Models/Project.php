<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $table = 'project';

    //protected $fillable = ['title'];
    public function address(){
        return $this->hasOne(AddressProject::class);
    }

    public function info(){
        return $this->hasOne(InfoProject::class);
    }
    public function general(){
        return $this->hasOne(GeneralView::class);
    }
    public function map(){
        return $this->hasOne(Map::class);
    }
    
    public function subdivision()
    {
        return $this->hasMany(SubdivisionView::class);
    }
     
    public function showflat()
    {
        return $this->hasMany(showflat::class);
    }

    public function  amentities(){
        return $this->hasMany(Amentities::class);
    }

    



}
