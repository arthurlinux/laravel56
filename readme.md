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

descargar el proyecto en cualquier lugar del sistema y correr los siguientes comandos
composer install 
composer update --no-scripts 
php artisan key:generate
 Configurar el archivo .env.example y cambiarle el nombre a .env
 agregar credenciales
php artisan migrate 
php artisan serve
htt://127.0.0.1:8000

login  user  : localhost/laravel56/public/login
user: admin@admin.com
pass. 123456
login admin : localhost/laravel56/public/admin
user: admin@admin.com
pass: hugoiman
