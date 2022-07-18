<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'description',
		'image_url',
		'size',
		'quantity',
		'sale_price',
		'cost_price'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
