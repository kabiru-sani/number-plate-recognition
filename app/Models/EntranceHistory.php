<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntranceHistory extends Model
{
    protected $fillable = [
        'plate_scan_id',
        'scanned_at',
        'gate_location',
    ];

    public function plateScan()
    {
        return $this->belongsTo(PlateScan::class);
    }
    
}
