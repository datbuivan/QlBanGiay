<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'status',
        'role_id',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestames =false;


    public function roles():BelongsTo
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,['employee_id','id'],['customer_id','id']);
    }

    public function reviews():HasMany
    {
        return $this->hasMany(Review::class,'user_id','id');
    }

    public function cart():BelongsTo
    {
        return $this->belongsTo(Cart::class,'customer_id','id');
    }

}