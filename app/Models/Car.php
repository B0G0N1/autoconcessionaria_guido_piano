<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'model',
        'year',
        'color',
        'price',
        'engine',
        'horsepower',
        'doors',
        'km',
        'used',
        'thumb'
    ];
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function optionals()
    {
        return $this->belongsToMany(Optional::class);
    }
}
