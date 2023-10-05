<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps= false;

    use HasFactory;
    public function users(): HasMany
    {
        return $this->hasMany(User::class,'roles_id','id');
    }
}
