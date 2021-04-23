<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id','product_id','quantity','price','status'
    ];

    //Relacion uno a muchos Inversa
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    //Relacion uno a muchos Inversa
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
