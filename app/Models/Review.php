<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['id','rate','comment','product_id','user_id'];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function product():BelongsTo
    {
        return $this->belongsTo(product::class,'product_id','id');
    }

}