<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function productDetails(): BelongsToMany
    {
        return $this->belongsToMany(Purchases::class,'purchase_details','order_id','product_detail_id');
    }
}
