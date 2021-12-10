# Agenda de contactos con clases y bases de datos
Aplicación para ver los contactos registrados en una agenda de teléfonos además de poder añadir nuevos, editar o eliminar los existentes.

La información se almacena en base de datos. Se instancian clases para acceder a consultas y métodos diversos que permiten las operaciones CRUD.

## Instrucciones de uso

1. Abrir base de datos en local y ejecutar los scripts SQL del documento resources/database.sql
2. Sustituir los valores $username y $password de la clase "PhonebookDatabase.php" en la carpeta /config.
3. Generar un virtual host o incluir la carpeta de este proyecto bajo un directorio ya presente en un virtual host
4. Abrir el documento phonebook.php

## Características

* Para el acceso a la base de datos se usa el API PDO de PHP. Aplicación con MySQL.
* Consultas generadas en clase. Se preparan las de UPDATE e INSERT.
* Separación de la capa de presentación respecto la capa de acceso a datos.
* La interfaz permite tener las operaciones CRUD.
* Se dispone de un único formulario que carga dos posibles pantilla según se desee añadir o editar un contacto.
* Script de eliminación.
* Todas las acciones redirigen la "homepage".

## Estructura de la aplicación

### Archivos

  * _**phonebook.php**_ - "homepage" de la aplicación.
  * **_form-phonebook.php_** - formulario para editar o añadir un coontacto.

### Carpetas

* _**css**_ - carpeta con la hoja de estilos.
* **_config_** - carpeta que contiene las clases.
* **_resources_** - carpeta con diferentes scripts.

#### config/ 
* _**Contact.php**_ - clase que incluye todos los métodos que requiren de una consulta así como los atributos necesarios.
* _**PhonebookDatabase.php**_ - clase para la conexión de la base de datos. 

#### resources/
* _**database.sql**_ - comandos para la creación de la base de datos.
* _**delete-contact.php**_ - script que se ejecuta cuando desde el homepage se presiona el botón "Eliminar",
* _**add-contact-content.php**_ - formulario que se mostrará si se añade un contacto, que no cargará ningún valor en los inputs .
* _**edit-contact-content.php**_ - formulario que se mostrará si se edita un contacto, cargando los valores del contacto actual.