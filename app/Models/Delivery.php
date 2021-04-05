<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id', 'state_id', 'city_id', 'delivery_zone','days', 'delivery_time', 'delivery_free', 'min_amount_purchase', 'status'
    ];

    //Relacion uno a muchos Inversa
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    //Relacion uno a muchos Inversa
    public function city(){
        return $this->belongsTo('App\Models\City');
    }

    //Relacion uno a muchos Inversa
    public function state(){
        return $this->belongsTo('App\Models\State');
    }

}
