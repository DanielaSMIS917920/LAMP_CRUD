# Inventariado Despensa Feliz

##Contexto
Se desarrollo como prueba de aptitudes y conocimientos, un sistema de inventario y facturación, en este caso para una empresa ficticia llamada Despensa Feliz.

##Modalidad
Se escogio para el desarrollo del sitio web la primera modalidad, que consistia en utilizar PHP para el estructurado funcional, además de utilizar métodos HTTP básicos como GET y POST principalmente.

El sitio web cuenta con un apartado sencillo para usuarios sin permisos administrativos (seccion overview) y uno para usuarios con permisos administrativos (administrador). 

### Credenciales del administrador
*usuario: admin*
*contraseña: dfeliz1234*

## Instalación del sitio web
Para la creación del sitio web se desarrollo en un entorno LAMP (Linux - Apache - MySQL - Linux), por ellos cada pagina esta desarrollada con .php y hay archivos importantes que se deben ejecutar antes de ingresar al sitio web.

### Bases de datos
Antes de ejecutar el sitio web es necesario la creacion de la base de datos y tablas, para ello se debe ejecutar el archivo **db.php** por medio del comando:
```php db.php```

Con ese comando se habra creado la base de datos **despensa_feliz_db**.
Una vez creada la base, se procede a crear las tablas dentro de ella, para ello se debe ejecutar **install.php** por medio del comando:
```php install.php```

En caso de generar error en la ejecución de los archivos php mencionados anteriormente puede ser causado al no existir los usuarios con los permisos para esta base de datos, por lo cual se crean por medio del comando:
Ingresar a MySQL:
``` sudo mysql -u root -p ```

Crear el usuario para la base de datos:
``` CREATE USER 'admin'@'localhost' IDENTIFIED BY 'despensa1234'; ```

Se otorgan los permisos administrativos:
``` GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION; ```

## Ejecución
Una vez creada las bases de datos, el sitio web ya se encuentra listo para visualizar y trabajar sin problemas.

Se ininicia el sitio web en el navegador web de Linux:
``` http://localhost/LAMP_CRUD/index.php ```
