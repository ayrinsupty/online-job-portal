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
        'short_description',
        'description',
        'application_last_date',
        'status'
    ];
    public static $statusArray = ['inactive','active'];
}
