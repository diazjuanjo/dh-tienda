## Requisitos

* Tener instalado PHP7.2
* Tener instalado Composer

Crear base de datos

`CREATE DATABASE nombre;`


Ejecutar en terminal

`git clone https://github.com/diazjuanjo/dh-tienda.git`

`cd dh-tienda`

`composer install`

crear archivo .env 

`php artisan key:generate`

`php artisan migrate`

`php artisan db:seed`

`php storage:link`

`php artisan serv`
