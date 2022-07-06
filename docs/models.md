# Models

## Código

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

### Client

```php
// Campos preenchíveis
protected $fillable = [
    'cpf',
    'first_name',
    'last_name',
    'email',
    'phone',
    'login',
    'password'
];

// Accessor para o nome completo ($full_name)
public function getFullNameAttribute()
{
    return "${$this->first_name} ${$this->last_name}";
}

// Anexo do nome completo ($full_name) a representação array
protected $appends = [
    'full_name'
];

// Propriedades ocultas na tratativa da classe como array
protected $hidden = [
    'password'
];
```
