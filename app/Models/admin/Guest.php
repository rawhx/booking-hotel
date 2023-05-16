<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'number_id',
        'phone',
        'checkin',
        'checkout',
        'payment',
        'room',
    ];

    public function rooms()
    {
        return $this->belongsTo(Rooms::class, 'room');
    }
}
