# Factories

Factories são, resumidamente, classes responsáveis por popular o banco de dados para facilitar nos testes e no desenvolvimento no geral.

## Como usar?

Para popular o seu banco de dados local com os dados deve-se utilizar o terminal. A seguir os comandos e suas devidas explicações.

```sh
# Este primeiro comando irá apagar toda a estrutura atual do seu banco de dados.
php artisan db:wipe

# Por sua vez, o migrate irá construir o banco de acordo com a estrutura nas migrations do projeto.
php artisan migrate

# Este sim é responsável por popular o banco com os dados.
php artisan db:seed
```

> Os dois primeiros comando não são obrigatórios, mas, recomendo a todos utilizar eles para garantir que a estrutura do banco sempre esteja atualizada de acordo com o projeto.

## Quais dados serão gerados?

### ProductFactory.php

```php
return [
    'name' => $this->faker->colorName(),
    'description' => $this->faker->text(),
    'image_url' => $this->faker->imageUrl(),
    'size' => $this->faker->numberBetween(30, 45),
    'quantity' => $this->faker->numberBetween(0, 100),
    'sale_price' => $this->faker->numberBetween(20, 200),
    'cost_price' => $this->faker->numberBetween(20, 200)
];
```

### ClientFactory.php

```php
return [
    'cpf' => $this->faker->numberBetween(10000000000, 99999999999),
    'first_name' => $this->faker->firstName(),
    'last_name' => $this->faker->lastName(),
    'email' => $this->faker->email(),
    'phone' => $this->faker->phoneNumber(),
    'login' => $this->faker->userName(),
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
];
```

### OrderFactory.php

```php
return [
    'client_id' => $this->faker->numberBetween(1, 10),
    'product_id' => $this->faker->numberBetween(1, 20),
    'product_quantity' => $this->faker->numberBetween(1, 20),
    'status' => $this->faker->word(),
];
```
