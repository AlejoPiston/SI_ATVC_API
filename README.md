## Instrucciones de instalación

1. Tener instalado Laragon o las herramientas necesarias para ejecutar un proyecto en Laravel.
2. Crear una base de datos, de preferencia con el mismo nombre del proyecto.
3. Configurar, los siguientes parámetros, en el archivo .env:
    - Url en la que se ejecuta la aplicación *APP_URL*
    - Nombre de la base de datos *DB_DATABASE*
    - Usuario de acceso a la base de datos *DB_USERNAME*
    - Password de acceso a la base de datos *DB_PASSWORD*
4. Abrir la consola en el directorio del proyecto y ejecutar los siguientes comandos:
    - `composer install`
    - `php artisan key:generate`
    - `php artisan migrate:fresh --seed`
5. Para el administrador ingrese en /admin con las siguientes credenciales
    *username: admin*
    *password: admin*

## Cada vez que se sincroniza el proyecto con github
1. Configurar, los siguientes parámetros, en el archivo .env
    - Url en la que se ejecuta la aplicación *APP_URL*
    - Nombre de la base de datos *DB_DATABASE*
    - Usuario de acceso a la base de datos *DB_USERNAME*
    - Password de acceso a la base de datos *DB_PASSWORD*
2. Abrir la consola en el directorio del proyecto y ejecutar los siguientes comandos:
    - `composer install`
    - `php artisan migrate:fresh --seed`
3. Para el administrador ingrese en /admin con las siguientes credenciales
    *username: admin*
    *password: admin*

## En caso de tener la Alerta!: Falta el enlace simbólico de almacenamiento
1. Verificar que exista la carpeta public, caso contrario crearla.
2. Ejecutar el siguiente comando: `php artisan storage:link`

