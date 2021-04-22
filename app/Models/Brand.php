<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand','user_id','description','profile_photo_path_brand','slug','status'
    ];

    //Relacion uno a muchos
    public function banners(){
        return $this->hasMany('App\Models\Banner');
    }

    //Relacion uno a muchos Inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos
    public function ratings(){
        return $this->hasMany('App\Models\Rating');
    }

    //Relacion uno a muchos
    public function deliveries(){
        return $this->hasMany('App\Models\Delivery');
    }

    //Relacion uno a muchos
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    //Relacion uno a muchos
    public function items(){
        return $this->hasMany('App\Models\Item');
    }

    // Funcion para ver si la marca ofrece delivery gratis
    /* public function deliveryFree( $brand_id ){
         $brand = Brand::where('id', $brand_id)->first();

        if (isset( $brand->deliveries )){
            foreach ($brand->deliveries as $delivery){

            }
                                
            
            if ( $brand->deliveries->delivery_free == 1 ){
                $delivery_free = 1; 
                break;
            }
        }
        
    } */
}
