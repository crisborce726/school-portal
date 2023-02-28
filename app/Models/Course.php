<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'course_code',
        'course_title',
        'level',
    ];

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
