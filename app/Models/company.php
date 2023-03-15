<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'logo',
    ];

    public static $statusArrays = ['active', 'deactive'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
