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

## Posso gerar dados para uma tabela específica?

Resumidamente, sim. Montei um simples seeder para a tabela de usuários do banco que vai gerar 10 novos usuários e cadastrá-los no banco.

```sh
# Mesmo comando, porém especificando que deseja utilizar somente o seeder para a tabela usuários.
php artisan db:seed UsersSeeder
```

> Não criei seeders para outras tabelas, mas seria uma ótima adição para o decorrer do desenvolvimento do projeto. Caso necessário posso me encarregar da responsabilidade.

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

### UserFactory.php

```php
return [
    'first_name' => $this->faker->firstName(),
    'last_name' => $this->faker->lastName(),
    'birth_date' => $this->faker->date(),
    'phone' => $this->faker->phoneNumber(),
    'address' => $this->faker->address(),

    'cpf' => $this->faker->unique()->numberBetween(10000000000, 99999999999),
    'cep' => $this->faker->numberBetween(10000000, 99999999),
    'email' => $this->faker->unique()->safeEmail(),

    'email_verified_at' => now(),
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    'remember_token' => Str::random(10),
];
```

### OrderFactory.php

```php
return [
    'user_id' => User::all()->random()->id,
    'product_id' => Product::all()->random()->id,
    'product_quantity' => $this->faker->numberBetween(1, 20),
    'status' => $this->faker->word(),
];
```
