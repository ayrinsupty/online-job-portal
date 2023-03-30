<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerReference extends Model
{
    use HasFactory;

    protected $table = 'seeker_references';
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'occupation',
        'designation'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
