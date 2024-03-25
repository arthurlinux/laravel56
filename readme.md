Instrucciones para instalar laravel 5.6 
 clonar repositorio 
 git clone https://github.com/arthurlinux/laravel56.git
 o descargar la carpeta zip

 Configurar el archivo .env.example y cambiarle el nombre a .env
agregar sus datos de conexión de bases de datos usuario password puerto etc

crear la base de datos en su local 
importar el archivo laravel.sql

Dos formas de correr el proyecto
en htdocs poner el archivo descargado y ponerlo en raiz con el nombre que desee 
y poner en el navegador http://localhost/laravel56/public

y si es con composer 

descargar el proyecto en cualquier lugar del sistema y correr los siguientes comandos</br>
composer install </br>
composer update --no-scripts </br>
php artisan key:generate</br>
 Configurar el archivo .env.example y cambiarle el nombre a .env</br>
 agregar credenciales</br>
php artisan migrate </br>
php artisan serve</br>
htt://127.0.0.1:8000</br>

login  user  : localhost/laravel56/public/login </br>
user: admin@admin.com</br>
pass. 123456</br>
login admin : localhost/laravel56/public/admin</br>
user: admin@admin.com</br>
pass: hugoiman</br>

Crear un endpoint
php artisan make:model Usuarios -crm
