<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description','slug','photo_main_product','status'
    ];

    //Relacion uno a muchos
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    //Relacion uno a muchos
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    //Relacion uno a muchos
    public function items(){
        return $this->hasMany('App\Models\Item');
    }

     //Relacion uno a muchos
     public function articles(){
        return $this->hasMany('App\Models\Article');
    }
}
