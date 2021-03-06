<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasApiTokens;

    protected $table = 'users';
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'id',
        'name',
        'email',
        'role',
        'status'
    ];

    protected $hidden = [
        'password',
    ];
}
