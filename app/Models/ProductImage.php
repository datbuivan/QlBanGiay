<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ProductImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="product_images";
    public function product(): BelongstO
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}