<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    public $timestamps = false;
    protected $table ='purchase_details';
    use HasFactory;
}
