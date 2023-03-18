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
        'company_name',
        'designation',
        'from_date',
        'to_date',
    ];
}
