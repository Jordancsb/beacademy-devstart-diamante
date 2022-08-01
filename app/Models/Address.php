<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'postcode',
        'street',
        'number',
        'neighborhood',
        'city',
        'country'
    ];
}