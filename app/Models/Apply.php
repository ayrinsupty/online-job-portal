<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $table = 'applies';

    protected $fillable = [
        'user_id',
        'job_id',
        'status'
    ];
    public static $statusArray = ['pending','short-listed','approved'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'job_id','id');
    }
}
