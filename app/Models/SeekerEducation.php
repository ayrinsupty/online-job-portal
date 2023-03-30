<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerEducation extends Model
{
    use HasFactory;
    protected $table = 'seeker_educations';
    protected $fillable = [
        'user_id',
        'institute_name',
        'start_date',
        'end_date',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
