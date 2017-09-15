

```
composer install
php -S localhost:8080 ./web/graphql.php
```

```
{
  property(id: 2) {
    id
    transaction,
    price {
      amount
      currency
    }
    location {
      id
      lat
      lng
    }
  }
}
```
