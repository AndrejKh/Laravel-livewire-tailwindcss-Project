<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id','photo','status'
    ];

    //Relacion uno a muchos Inversa
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
}
