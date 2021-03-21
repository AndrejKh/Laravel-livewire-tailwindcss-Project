<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //Relacion uno a muchos Inversa
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    //Relacion uno a muchos Inversa
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
