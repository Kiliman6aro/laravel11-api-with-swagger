# Laravel swagger
> Default username: "**test@example.com**" and password "**password**"
> of course after did run **php artisan db:seed**
> 
> Documentation available on: http://127.0.0.1/api/documentation 

## Installation

Install laraverl-swagger with composer

```bash
  php composer install
  php artisan migrate
  php artisan db:seed
  php artisan key:generate
```
## Run

```bash
  php artisan serve
```

## Swagger documentation

Manual generate documentation:
```bash
php artisan l5-swagger:generate
```
or set L5_SWAGGER_GENERATE_ALWAYS to true in .env file.
```
L5_SWAGGER_GENERATE_ALWAYS=true
```

## Links
[Go to swagger documentation](https://github.com/zircote/swagger-php)

[Go to example pet project](https://github.com/zircote/swagger-php/tree/master/Examples/petstore-3.0)
