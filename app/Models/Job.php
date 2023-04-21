<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'salary',
        'type',
        'short_description',
        'description',
        'application_last_date',
        'status'
    ];
    public static $statusType = ['Part-Time','Full-time'];
    public static $statusArray = ['inactive','active'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function applicant(){
        return $this->hasMany(Apply::class,'job_id','id');
    }
}
