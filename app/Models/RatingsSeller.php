<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingsSeller extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment','rating','status', 'order_id', 'brand_id', 'user_id'
    ];

    //Relacion para calcualr el rating total de un comprador
    public function rating_total($id_user){
        $array_ratings = Rating::where('user_id', $id_user)->get();
        $cont=0;
        $rating_acumulado=0;
        foreach ($array_ratings as &$rating) {
            $rating_acumulado+=$rating->rating;
            $cont++;
        }
        $rating_total = round($rating_acumulado/$cont, 2);
        return $rating_total;
    }

    //Relacion uno a muchos Inversa
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    //Relacion uno a muchos Inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a uno
    public function order(){
        return $this->hasOne('App\Models\Order');
    }
}
