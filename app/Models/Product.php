<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeltes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'import_price',
        'export_price',
        'discount',
        'avatar',
        'object_id',
        'product_status',
        'hot_status',
        'best_seller_status',
        'color_id',
        'type_product_id',
        'design_id',
        'gender_id',
    ];

    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }

    public function typeProduct(): BelongsTo
    {
        return $this->belongsTo(TypeProduct::class, 'type_product_id', 'id');
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

    public function productImage(): HasMany
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function colors(): BelongsTo
    {
        return $this->belongsTo(Color::class,'color_id', 'id');
    }

    public function order(): BelongsToMany
    {
        return $this->belongsToMany(Order::class,'order_details','product_detail_id','order_id');
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class,'product_id', 'id');
    }

    public function purchases(): BelongsToMany
    {
        return $this->belongsToMany(Purchases::class,'purchase_details','product_detail_id','order_id');
    }
}