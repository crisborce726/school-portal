<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'start_date', 'end_date', 'color'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
