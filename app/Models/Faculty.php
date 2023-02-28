<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'birthday',
        'birthplace',
        'religion',
        'civil_status',
        'nationality',
        'mobile_no',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
