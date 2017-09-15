

```
composer install
php -S localhost:8080 ./web/graphql.php
```

```
{
  property(id: 1) {
    id
    transaction
    location {
      id
      lat
      lng
    }
  }
}
```
