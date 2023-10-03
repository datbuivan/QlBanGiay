<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }
}
