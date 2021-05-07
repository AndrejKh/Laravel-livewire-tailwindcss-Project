<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    //Relacion uno a uno, en misma tabla
    public function categoy_father($padre_id){
        $category_father=Category::where('padre_id',$padre_id)->first();
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
