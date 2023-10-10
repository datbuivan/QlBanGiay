<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }

    public function typeProduct(): BelongsTo
    {
        return $this->belongsTo(TypeProduct::class, 'type_product_id', 'id');
    }

    public function productImage(): HasMany
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function reviews():HasMany
    {
        return $this->hasMany(Review::class,'product_id','id');
    }
    public function gender():BelongsTo
    {
        return $this->belongsTo(Gender::class,'gender_id','id');
    }
    public function design():BelongsTo
    {
        return $this->belongsTo(Design::class,'design_id','id');
    }

}
