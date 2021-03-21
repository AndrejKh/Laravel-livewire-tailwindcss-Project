<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    //Relacion uno a muchos
    public function cities(){
        return $this->hasMany('App\Models\City');
    }

    //Relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
