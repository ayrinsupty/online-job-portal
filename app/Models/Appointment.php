<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'user_id',
        'job_id',
        'apply_id',
        'link'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'job_id','id');
    }
    public function apply(){
        return $this->belongsTo(Apply::class,'apply_id','id')->orderBy('id', 'DESC');
    }
}
