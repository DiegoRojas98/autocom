Proyecto AutoCom (Laravel 11)

para ejecutar el proyecto de manera local por favor tenga en cuenta los siguiente requisitos:

   -php version >= 8.3
   -extenciones php (zip, curl, xml, mbstring, gd, intl)
   -mysql servidor en el puerto 3036 (base de datos autocom)
   -node
   -composer 
   -git


--> Codigo Fuente
Por favor se le aconseja descargar el codigo fuente con el uso de git con el comando

    git clone https://github.com/DiegoRojas98/autocom



--> Ejecuciones
Existen diversas formas para la ejecucion del proyecto en este caso explicare
las dos principales, las cuales son ejecucion con ayuda de XAMPP y ejecucion con Docker



--> Ejecucion con XAMPP
Para ejecutar el proyecto nos podemos apoyar de la aplicacion XAMPP la cual
tiene como herramientas la creacion de servicios php y mysql, los cuales
nos serviran para ejecutar laravel.

Para ello copiaremos el codigo fuente en la ruta "xampp/htdocs/"

- Modificacion de variable DB_HOST en .env
Por favor para conectarse correctamente a la base de datos por medio de XAMPP 
verifique la varible DB_HOST en el archivo .env
	
	DB_HOST=localhost

Por favor tener encuenta que las variables DB_USERNAME y DB_PASSWORD deben ser 
coincidentes con el usuario y clave de mysql XAMPP los cuales normalente son user=root 
y password '' (vacio), esto dependera exclusivamente de la configuracion de mysql XAMPP, 
por tal motivo en el archivo ".env" vera que ambas estan definidas como DB_USERNAME=root 
y DB_PASSWORD=  . Esto lo puede modificar segun los datos de usuario de su mysql XAMPP

Una vez realizado este paso abrimos una terminal en la ruta del codigo fuente 
"xampp/htdocs/autocom/" y ejecutamos los siguientes comandos

    composer update
    composer install
    npm update
    npm install

- Importacion de base de datos
Ingrese ha phpmyadmin, cree la base de datos "autocom" e importe el archivo 
"autocomDB.sql" el cual se encuentra dentro del codigo fuente en la ruta 
"autocom/database/backups/"

Ejecute los siguientes comandos en dos terminales ubicadas en la ruta del codigo fuente

	php artisan serve --port=8086
	npm run dev

Una vez realizado lo anterior la aplicacion debera estar lista localmente en el url 

	http://127.0.0.1:8086




--> Ejecucion Con Docker (linux)
El proyecto puede ser ejecutado en un entorno docker para realizarlo tenga muy en cuenta los 
requisitos ya descritos y el uso del entorno de docker.

Teniendo encuenta que nos encontramos en un sistema operativo basado en linux y que ya habremos 
descargado el codigo fuente realizaremos lo suiguiente.

- Modificacion de variable DB_HOST en .env
Por favor para conectarse correctamente a la base de datos por medio de contenedores Docker
verifique la varible DB_HOST en el archivo .env
	
	DB_HOST=mysql

En el directorio del codigo fuente ejecutaremos los siguientes comandos encargados de
descargar las dependencias correspondientes del proyecto y dar permisos a los archivos

    composer update
    composer install
    npm update
    npm install
    sudo chmod -R ugo+rw storage

Luego de esto ejecute el suiguiente comando el cual se encarga de crear los contenedores requeridos 
por la aplicacion, especificados en el archivo "docker-compose.yml" el cual hace uso del archivo ".env"

    docker-compose up -d

Para la base de datos podemos realizar alguna de las siguientes acciones

- Ejecutar migraciones(seeders)
Ejecute el siguiente comando para realizar las migraciones junto a los seeder, los cuales 
tienen los datos requeridos para la correcta ejecucion del proyecto

    docker-compose exec laravel.test php artisan migrate:fresh --seed

- Importacion de base de datos
Ingrese al contenedor  "mysql", cree la base de datos "autocom" e importe el archivo 
"autocomDB.sql" el cual se encuentra dentro del codigo fuente en la ruta "autocom/database/backups/" 


Luego de esto ejecute el comando el cual servira de ayuda para compilar los estilo

    docker-compose exec laravel.test npm run dev

Una vez realizado lo anterior la aplicacion debera estar lista localmente en el url 

    http://127.0.0.1:8086
    http://localhost:8086
