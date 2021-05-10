<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category','description','padre_id','photo','slug','status'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'category'
            ]
        ];
    }

    public function getCreatedAtAttribute($date){
        return new Date($date);
    }

    public function getUpdatedAtAttribute($date){
        return new Date($date);
    }

    //Relacion uno a uno, en misma tabla
    public function categoy_father(){
        $category_father = Category::where('id',$this->padre_id)->first();
        return $category_father;
    }

    public function categories_children($category_id){
        $categories=Category::where('padre_id',$category_id)->get();
        return $categories;
    }

    //Relacion uno a muchos
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }



}
