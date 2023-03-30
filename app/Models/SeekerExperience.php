<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerExperience extends Model
{
    use HasFactory;
    protected $table = 'seeker_experiences';
    protected $fillable = [
        'user_id',
        'company_name',
        'designation',
        'from_date',
        'to_date',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
