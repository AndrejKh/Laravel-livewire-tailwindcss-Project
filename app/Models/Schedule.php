<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day_id','open_hour', 'close_hour'
    ];

    public function getCreatedAtAttribute($date){
        return new Date($date);
    }

    public function getUpdatedAtAttribute($date){
        return new Date($date);
    }

    //Relacion uno a muchos Inversa
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    //Relacion uno a muchos Inversa
    public function day(){
        return $this->belongsTo('App\Models\DaysWeek');
    }
}
