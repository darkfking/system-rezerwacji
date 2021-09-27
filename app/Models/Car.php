<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'marka',
        'model',
        'silnik',
        'moc',
        'liczbaMiejsc',
        'opis',
        'zdjecie',
        'cena',
        'cena1',
        'cena2'
    ];
}
