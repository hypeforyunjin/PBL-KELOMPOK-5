<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table ="admins";
    protected $guard = 'admin';
    protected $guarded = [];
    protected $hidden = [
        'password',
    ];
}

