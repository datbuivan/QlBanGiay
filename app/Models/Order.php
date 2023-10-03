<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,['customer_id','id'],['customer_id','id']);
    }

    public function delivers(): BelongsTo
    {
        return $this->belongsTo(Deliver::class,'deliver_id','id');
    }

    public function productDetailOrder(): BelongsToMany
    {
        return $this->belongsToMany(ProductDetail::class, 'order_details','order_id','product_detail_id');
    }
}
