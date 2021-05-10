<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Order extends Model
{
    use HasFactory;
    // use DatesTranslator;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id','user_id','amount','status','seller_status','buyer_status'
    ];

    public function getCreatedAtAttribute($date){
        return new Date($date);
    }

    public function getUpdatedAtAttribute($date){
        return new Date($date);
    }

    //Relacion uno a muchos Inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos Inversa
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    //Relacion uno a muchos
    public function products_purchase(){
        return $this->hasMany('App\Models\OrderProducts');
    }

    //obtengo la calificacion del vendedor a la orden
    // Relacion uno a uno
    public function ratingSeller(){
        return $this->hasOne('App\Models\RatingsSeller');
    }

    //obtengo la calificacion del comprador a la orden
    // Relacion uno a uno
    public function ratingBuyer(){
        return $this->hasOne('App\Models\RatingsBuyer');
    }


}
