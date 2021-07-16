<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Brand extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand','user_id','state_id','city_id','address','description','profile_photo_path_brand','whatsapp','slug','status'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'brand'
            ]
        ];
    }

    public function getCreatedAtAttribute($date){
        return new Date($date);
    }

    public function getUpdatedAtAttribute($date){
        return new Date($date);
    }

    //Relacion uno a muchos
    public function banners(){
        return $this->hasMany('App\Models\Banner');
    }

    //Relacion uno a muchos Inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos Inversa
    public function address(){
        return $this->hasOne('App\Models\AddressBrands');
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

    //Relacion uno a muchos
    public function ratingsSeller(){
        return $this->hasMany('App\Models\RatingsSeller');
    }

    //Relacion uno a muchos
    public function ratingsBuyer(){
        return $this->hasMany('App\Models\RatingsBuyer');
    }

}
