<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'user_id',
        'course_id',
        'birthday',
        'birthplace',
        'religion',
        'civil_status',
        'nationality',
        'mobile_no',
        'address',
        'elementary_school',
        'elementary_address',
        'elementary_year_graduated',
        'highschool_school',
        'highschool_address',
        'highschool_year_graduated',
        'guardian_name',
        'guardian_contact',
        'guardian_occupation',
        'guardian_address',
        'guardian_relationship',
        'mothers_name',
        'mothers_contact',
        'mothers_occupation',
        'mothers_address',
        'mothers_email',
        'fathers_name',
        'fathers_contact',
        'fathers_occupation',
        'fathers_address',
        'fathers_email',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
