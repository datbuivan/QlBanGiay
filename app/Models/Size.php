<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    public $timestamps= false;

    use HasFactory;
    public function users()
    {
    
    }
}
