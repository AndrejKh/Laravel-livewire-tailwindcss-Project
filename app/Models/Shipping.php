<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'delivery_zone','status'
    ];

    //Relacion uno a muchos Inversa
    public function buyer(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos Inversa
    public function city(){
        return $this->belongsTo('App\Models\City');
    }
}
