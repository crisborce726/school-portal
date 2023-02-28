<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'sem_id',
        'student_id',
        'tuitin_fee',
        'misc_fee',
        'lab_fee',
        'other_fee',
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function sem()
    {
        return $this->belongsTo(Semester::class);
    }
}
