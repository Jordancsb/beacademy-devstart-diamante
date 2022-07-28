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

	public function getProducts(string $search = null)
	{
		$products = $this->where(function ($query) use ($search) {
			if ($search) {
				$query->where('name', 'LIKE', "%{$search}%");
				$query->orWhere('size', $search);
			}
		})
			->where('quantity', '>', 0)
			->paginate(6);
		return $products;
	}
}
