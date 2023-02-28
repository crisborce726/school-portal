<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject_code',
        'subject_title',
        'course_id',
        'lec_unit',
        'lab_unit',
        'level',
    ];

    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
