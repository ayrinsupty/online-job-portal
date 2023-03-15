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
        'address',
        'phone',
        'image',
        'type',
    ];

    public static $statusArrays = ['active', 'deactive'];

}
