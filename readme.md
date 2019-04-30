<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Paso 1

Renombrar el archivo .env.example por .env

## Paso 2

Crear una base de datos y cambiar las variables de entorno en el archivo .env

## Paso 3

Ejecutar el siguientecomando para instalar las dependencias y librerias

```
composer install
```

## Paso 4

Ubicarse en la carpeta del proyecto y ejecutar las migraciones, las cuales crean las tablas en la base de datos

```
php artisan migrate
```

## Paso 4

Ubicarse en la carpeta del proyecto y ejecutar el siguiente seeder

```
php artisan db:seed --class=ProductsTableSeeder
```
