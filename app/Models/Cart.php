<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetails::class,'product_details_id', 'id');
    }
    public function users(): HasOne
    {
        return $this->hasOne(User::class,'customer_id','id');
    }
}