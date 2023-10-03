<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deliver extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,'deliver_id','id');
    }
}
