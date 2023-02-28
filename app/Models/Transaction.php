<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'account_id',
        'amount_payment',
        'date_of_payment',
        'payment_method',
        'type_of_payment',
    ];

    public function student_account()
    {
        return $this->belongsTo(StudentAccount::class);
    }
}
