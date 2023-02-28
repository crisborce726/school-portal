<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'classes_id',
        'student_id',
    ];

    public function classes()
    {
        return $this->belongsTo(ClassSchedule::class, 'classes_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
