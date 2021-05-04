<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'brand','user_id','state_id','city_id','address','description','profile_photo_path_brand','slug','status'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'brand'
            ]
        ];
    }

    //Relacion uno a muchos
    public function banners(){
        return $this->hasMany('App\Models\Banner');
    }

    //Relacion uno a muchos Inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos inversa
    public function state(){
        return $this->belongsTo('App\Models\State');
    }

    //Relacion uno a muchos inversa
    public function city(){
        return $this->belongsTo('App\Models\City');
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
