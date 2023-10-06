<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Design extends Model
{
    use HasFactory;
    public function typeProduct():BelongsTo
    {
        return $this->belongsTo(TypeProduct::class,'type_product_id','id');
    }
}
