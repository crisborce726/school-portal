<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'course_id',
        'subject_id',
        'section',
        'sem_id',
        'lec_schedule',
        'lab_schedule',
        'teacher_id',
        'status',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function sem()
    {
        return $this->belongsTo(Semester::class, 'sem_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

}
