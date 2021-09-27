<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zaliczka extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value',
        'days',
        'paymentId',
        'email',
        'statusPayment'
    ];
}
