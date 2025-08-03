<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'gender',
        'address',
        'state_of_origin',
        'department',
    ];
}
