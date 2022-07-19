# Models

## Código

### Product

```php
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
```

### User

```php
protected $fillable = [
    'first_name',
    'last_name',
    'birth_date',
    'phone',
    'address',
    'cep',
    'cpf',
    'email',
    'password',
    'admin',
    'user'
];

protected $appends = [
    'full_name'
];

protected $hidden = [
    'password',
    'remember_token',
];

protected $casts = [
    'email_verified_at' => 'datetime',
    'admin' => 'boolean'
];

public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}

public function orders()
{
    return $this->hasMany(Order::class);
}
```

### Order

```php
protected $fillable = [
    'client_id',
    'product_id',
    'product_quantity',
    'status'
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function product()
{
    $this->belongsTo(Product::class);
}
```
