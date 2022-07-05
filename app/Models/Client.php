<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'first_name',
        'last_name',
        'email',
        'phone',
        'login',
        'password'
    ];

    public function getFullNameAttribute()
    {
        return "${$this->first_name} ${$this->last_name}";
    }

    protected $appends = [
        'full_name'
    ];

    protected $hidden = [
        'password'
    ];
}
