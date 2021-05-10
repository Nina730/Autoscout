<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'engine_size',
        'price',
        'registration_date',
        'image',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class)->withPivot("quantity");
    }
}
