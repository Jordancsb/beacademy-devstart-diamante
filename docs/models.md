# Models

## Código

### Product

```php
// Campos preenchíveis
protected $fillable = [
    'name',
    'description',
    'image_url',
    'size',
    'quantity',
    'sale_price',
    'cost_price'
];
```

### User

```php
protected $fillable = [
    'first_name',
    'last_name',
    'birth_date',
    'phone',
    'address',
    'cpf',
    'email',
    'password',
    'admin',
    'user'
];

protected $appends = [
    'full_name'
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
];

public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}
```

### Order

```php
// Campos preenchíveis
protected $fillable = [
    'client_id',
    'product_id',
    'product_quantity',
    'status'
];
```
