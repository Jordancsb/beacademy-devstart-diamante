# Documentação da API

É simples, mas creio que da para criar uma requisição e leitura da reposta.

```http
Método: POST

Url: https://tracktools.vercel.app/api/checkout

Headers: 'Content-Type: application/json',
         'token: UGFyYWLDqW5zLCB2b2PDqiBlc3RhIGluZG8gYmVtIQ=='

Body: data[] das requisições de exemplo abaixo.
```

## Exemplo de requisições

### Transação com cartão de crédito

```http
curl --request POST \
  --url https://tracktools.vercel.app/api/checkout \
  --header 'Content-Type: application/json' \
  --header 'token: UGFyYWLDqW5zLCB2b2PDqiBlc3RhIGluZG8gYmVtIQ==' \
  --data '{
    "transaction_type": "card",
    "transaction_amount": 129.48,
    "transaction_installments": 2,
    "customer_name": "Regis Santos",
    "customer_document":"33355566677",
    "customer_card_number": "3333444455556666",
    "customer_card_expiration_date": "12/2025",
    "customer_card_cvv": "892"
}'
```

### Transação com boleto

```http
curl --request POST \
  --url https://tracktools.vercel.app/api/checkout \
  --header 'Content-Type: application/json' \
  --header 'token: UGFyYWLDqW5zLCB2b2PDqiBlc3RhIGluZG8gYmVtIQ==' \
  --data '{
    "transaction_type": "ticket",
    "transaction_amount": 129.48,
    "transaction_installment": 2,
    "customer_name": "Regis Santos",
    "customer_document":"33355566677",
    "customer_postcode": "12999444",
    "customer_address_street": "Rua dos Bobos",
    "customer_andress_number": "0",
    "customer_address_neighborhood": "Muito engraçada",
    "customer_address_city": "Caçapava",
    "customer_address_state": "São Paulo",
    "customer_address_country": "Brasil"
}
```
