<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified_at',
        'address',
        'phone',
        'image',
        'type',
    ];

    public static $statusArrays = ['active', 'deactive'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
