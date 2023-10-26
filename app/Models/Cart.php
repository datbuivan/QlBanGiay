<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id','name','avatar','export_price','quantity','size','color','product_id','customer_id' ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class,'product_id', 'id');
    }
    public function users(): HasOne
    {
        return $this->hasOne(User::class,'customer_id','id');
    }
}