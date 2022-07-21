# Models

## Como posso utilizar o relacionamento entre modelos?

```php
// Caso deseje listar todas os pedidos de um produto, e retornará todos dentro do banco.
$product->orders()->get();

// O mesmo aqui, caso deseje listar todos os pedidos de um usuário.
$user->orders()->get();

// Neste caso, se desejar informações a respeito do produto ou do cliente utilize.
$order->user;
$order->product;
```

> Por favor, me comuniquem caso algo não esteja devidamente funcionando.

## Computed `$user->full_name`

```php
// Para receber o nome completo do usuário, sem a necessidade de concatenar na mão criei o full_name.

// Ao invés de...
$fullName = "{$user->first_name} {$user->last_name}";

// Utilize...
$user->full_name; // Irá retornar o nome já concatenado.
```

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
    return $this->belongsTo(Product::class);
}
```
