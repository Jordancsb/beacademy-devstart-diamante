<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'birth_date',
		'phone',
		'cpf',
		'email',
		'password',
		'admin',
		'user'
	];

	protected $appends = [
		'full_name',
		'formatted_birth_date'
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'admin' => 'boolean',
		'birth_date' => 'date'
	];

	public function getFullNameAttribute()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	public function getFormattedBirthDateAttribute()
	{
		$date = strtotime($this->birth_date);

		return date('d/m/Y', $date);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function address()
	{
		return $this->hasOne(Address::class);
	}
}
