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
        'state',
        'number',
        'neighborhood',
        'city',
        'country'
    ];

    protected $hidden = [
        'id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function getFormattedFullAddressAttribute()
    {
        return "{$this->street}, {$this->number}, {$this->neighborhood}, {$this->city}, {$this->country}, {$this->postcode}.";
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
