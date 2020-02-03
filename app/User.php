<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use willvincent\Rateable\Rateable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Rateable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $tables = "users";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function yazilari(){
        return $this->hasMany('App\Yazi','user_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function yetki(){
        return $this->yetki;
    }

    public function yorumlari(){
        return $this->hasMany('App\Yorum','user_id');
    }

}
