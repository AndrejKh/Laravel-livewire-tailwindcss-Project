<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class State extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state','code','status'
    ];

    public function getCreatedAtAttribute($date){
        return new Date($date);
    }

    public function getUpdatedAtAttribute($date){
        return new Date($date);
    }


    //Relacion uno a muchos
    public function cities(){
        return $this->hasMany('App\Models\City');
    }

    //Relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    //Relacion uno a muchos
    public function brands(){
        return $this->hasMany('App\Models\Brand');
    }

    //Relacion uno a muchos
    public function deliveries(){
        return $this->hasMany('App\Models\Delivery');
    }
}
