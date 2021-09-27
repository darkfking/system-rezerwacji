<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'start_h',
        'finish',
        'finish_h',
        'firma',
        'nip',
        'userId',
        'key',
        'status',
        'carId',
        'imie',
        'nazwisko',
        'telefon',
        'email',
        'miejscowosc',
        'kodPocztowy',
        'adres',
        'addition',
        'kwota',
        'paymentId',
        'statusPayment'
    ];
}
