<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlateScan extends Model
{
    protected $fillable = [
        'user_id',
        'plate',
        'score',
        'image_path',
        'raw_response',
        'owner_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function entranceHistories()
    {
        return $this->hasMany(EntranceHistory::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
}
