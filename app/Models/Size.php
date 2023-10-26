<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function productDetailSizes(): HasMany 
    {
        return $this->hasMany(ProductDetail::class,'size_id','id');
    }
    
}