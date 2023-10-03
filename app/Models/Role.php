<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps= false;

    use HasFactory;
    public function users(): HasMany
    {
        return $this->hasMany('App\User','roles_id','id');
    }
}
