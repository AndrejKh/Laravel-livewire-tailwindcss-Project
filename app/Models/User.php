<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type_identity','doc_identity','address','phone','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //Relacion uno a muchos inversa
    public function state(){
        return $this->belongsTo('App\Models\State');
    }

    //Relacion uno a muchos inversa
    public function city(){
        return $this->belongsTo('App\Models\City');
    }

    //Relacion uno a muchos
    public function brands(){
        return $this->hasMany('App\Models\Brand');
    }

    //Relacion uno a muchos
    public function items(){
        return $this->hasMany('App\Models\Item');
    }

     //Relacion uno a muchos
     public function ratings(){
        return $this->hasMany('App\Models\Rating');
    }

    //Relacion uno a muchos
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    //Relacion uno a muchos, direcciones de envio de los compradores, lugares donde se recibiran los pedidos.
    public function shippings(){
        return $this->hasMany('App\Models\Shipping');
    }
}
