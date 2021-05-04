<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city','slug','status','state_id'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'city'
            ]
        ];
    }

    //Relacion uno a muchos Inversa
    public function state(){
        return $this->belongsTo('App\Models\State');
    }

    //Relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    //Relacion uno a muchos
    public function brands(){
        return $this->hasMany('App\Models\Brand');
    }

    //Relacion uno a muchos
    public function deliveries(){
        return $this->hasMany('App\Models\Delivery');
    }

    //Relacion uno a muchos, direcciones de envio de los compradores, lugares donde se recibiran los pedidos.
    public function shippings(){
        return $this->hasMany('App\Models\Shipping');
    }
}
