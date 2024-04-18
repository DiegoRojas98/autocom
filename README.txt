Proyecto AutoCom (Laravel 11)

para ejecutar el proyecto de manera local por favor tenga en cuenta los siguiente requisitos:

-php version 8.3
-extenciones php zip, curl, xml, mbstring, intl, gd, zip
-mysql servidor en el puerto 3036 (base de datos autocom)
-npm version 8.5



-Docker (linux)
El proyecto puede ser ejecutado en un entorno docker para realizarlo tenga muy en cuenta los 
requisitos antes descritos y el uso del entorno de docker.

Ubiquese en el directorio autocom y cree el archivo .env (si no existe) los datos de este archivo
se encuentra la final del archivo actual en la seccion "-Datos .env".

Una vez creado el archivo .env ejecute los siguientes comandos

    composer update
    composer install
    npm update
    npm install
    sudo chmod -R ugo+rw storage

Estos descargaran las dependencias correspondientes del proyecto (tenga en cuenta que las dependencias
dependencias pueden llegar a generar error si la versiones y extenciones de php no son correctas).

Luego de esto ejecute el comando 

    docker-compose up -d

Este creara los contenedores requeridos por la aplicacion especificados en el archivo 
docker-compose.yml el cual hace uso del archivo .env (he aqui la importancia de creara
el archivo .env)

Luego de esto ejecute el comando 

    docker-compose exec laravel.test npm run dev -d

Este comando compilara los estilos


Para la base de datos puede realizar dos acciones

1.Ejecute el comando 

    docker-compose exec laravel.test php artisan migrate:fresh --seed

Esto ejecutara las migraciones de de la base de datos 

2.Ingrese al contenedor  "mysql" si no existe, cree la base de datos "autocom" e importe el archivo 
"autocomDB.sql" el cual se encuentra dentro del directorio "autocom/database/backups/" 


Una vez realizado lo anterior la aplicacion debera estar lista localmente en el url 

    http://127.0.0.1:8086






-Datos .env 

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:bD2iLPHFIabi3b8T3YDZHRxStTyZ1Az3PJDfIECEmH8=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=autocom
DB_USERNAME=auto
DB_PASSWORD=com

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://meilisearch:7700

MEILISEARCH_NO_ANALYTICS=false

WWWGROUP=1000
WWWUSER=1000
