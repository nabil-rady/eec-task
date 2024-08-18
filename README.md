# EEC-Task

A Simple CRUD app built using Laravel, jQuery and Bootstrap.

## Instruction to run the app

You can either run it locally or using docker-compose.

### To run the app susing docker

Make sure you have docker and docker compose installed and then run the following command:

```
docker-compose up
```

Then you should be able to browse the app on localhost:8000.

### To run the app locally

You need to install php >= 7.4, composer and php-gd. Then, run:

```
composer install
php artisan migrate
php artisan storage:link
php artisan serve
```

## Running the seeders

The app has a seeder to insert 50k products and 20k pharmacies, the seeder may take a while to complete.

### To run the seeder using docker

```
docker-compose exec app php artisan db:seed
```

### To run the seeder locally

```
php artisan db:seed
```
