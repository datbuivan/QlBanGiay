<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $timestames =false;
    public function product():HasMany
    {
        return $this->hasMany(Product::class,'gender_id','id');
    }
}
