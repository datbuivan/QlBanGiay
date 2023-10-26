<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    public $timestamps = false;
    protected $table ='order_details';
    protected $fillable = ['price','quantity','order_id','product_id','size','avatar'];
    use HasFactory;

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}