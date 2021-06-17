<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Jenssegers\Date\Date;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description','slug','thumbnail','photo_main_product','category_id','status'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
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
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    //Relacion uno a muchos Inversa
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //Relacion uno a muchos
    public function items(){
        return $this->hasMany('App\Models\Item');
    }

     //Relacion uno a muchos
     public function articles(){
        return $this->hasMany('App\Models\OrderProducts');
    }
}
