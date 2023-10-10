<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Design extends Model
{
    use HasFactory;
    public function typeProduct():HasMany
    {
        return $this->hasMany(Product::class,'design_id','id');
    }
}
