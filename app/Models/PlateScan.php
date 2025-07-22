<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlateScan extends Model
{
    protected $fillable = [
        'user_id',
        'plate',
        'image_path',
        'raw_response',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
