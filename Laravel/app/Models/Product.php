<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'title',
        'brand_id',
        'price',
        'engine_power',
        'description',
        'transmission_id',
        'fuel_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class);
    }
}
