<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProductDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='product_details';
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
    public function sizes(): BelongsTo
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function colors(): BelongsTo
    {
        return $this->belongsTo(Color::class,'color_id', 'id');
    }
    public function order(): BelongsToMany
    {
        return $this->belongsToMany(Order::class,'order_details','product_detail_id','order_id');
    }
    public function purchases(): BelongsToMany
    {
        return $this->belongsToMany(Purchases::class,'purchase_details','product_detail_id','order_id');
    }

}
