

```
composer install
php -S localhost:8080 ./web/graphql.php
```

```
{
  property(id:2) {
    id
    transaction
    price {
      currency
      amount
    }
    location {
      lat,
      lng
    }
    createdAt {
      date(format:"Y")
    }
    updatedAt {
      timestamp
      date
    }
  }
}
```
