<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'season_id',
        'name',
        'description',
        'price',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
