<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;



class SocialAuthAccount extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
        'name', 'email','password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
