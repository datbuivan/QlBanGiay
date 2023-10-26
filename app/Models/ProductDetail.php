<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

}