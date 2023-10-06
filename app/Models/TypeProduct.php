<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="type_products";
    public function product(): HasMany
    {
        return $this->hasMany(Product::class,'type_product_id','id');
    }

    public function design():HasMany
    {
        return $this->belongsTo(Design::class,'type_product_id','id');
    }
}
