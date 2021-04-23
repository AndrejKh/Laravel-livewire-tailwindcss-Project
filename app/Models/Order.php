<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id','user_id','amount','status'
    ];

    //Relacion uno a muchos Inversa
    public function buyer()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos Inversa
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    //Relacion uno a muchos
    public function articles(){
        return $this->hasMany('App\Models\OrderProducts');
    }


}
