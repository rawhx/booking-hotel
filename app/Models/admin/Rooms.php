<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'price',
        'tipe',
        'aksi',
    ];

    public function guest()
    {
        return $this->hasMany(Guest::class);
    }
}
