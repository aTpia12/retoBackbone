# zip-codes
Search any zipcodes from Mexico

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

Mira **Deployment** para conocer como desplegar el proyecto.


### Pre-requisitos 📋

_Versiones de framework y lenguaje_

```
Laravel 9
PHP 8.1
```

### Descargar carpeta del repositorio 🔧

_Desde la URL del repositorio puede desacargar el proyecto en carpeta zip_

_Desde la terminal, dentro de la carpeta del proyecto debera ejecutar los siguientes comandos para instalara las dependencias y levantar el servidor_

```
1.- composer install
2.- php artisan serve
```
### Clonar el repositorio 🔧


_Desde la terminal, dentro de la carpeta que contendrá el proyecto clonado, debera ejecutar los siguientes comandos_

```
1.- git clone https://github.com/aTpia12/zip-codes.git
2.- Una vez clonado el proyecto procedemos a realizar el punto anterior para instalar dependencias y levantar el servidor
```

## Ejecutando las pruebas ⚙️

_Test php unit_

### Analice las pruebas end-to-end 🔩

_Se integra un test básico de respuesta GET con status 200 a la api_

```
Dentro de la carpeta del proyecto en una terminal ejecutar lo siguiente:

1.- ./vendor/bin/phpunit
```

## Autor ✒️

* **Ing. Jorge Augusto Tapia Sánchez** - *Desarrollador* - [aTpia12](https://github.com/aTpia12/)

## Solución 📄

* Se implementa la lectura de archivo txt para agilizar la busqueda de códigos postales, mediante array_filter y preg_match.
* Se agrega validación en un trait para la recepción de codigos postales en la url y verificar que esté contenga 5 dígitos númericos.
* Se añade trait de generación de cabecera y cuerpo de datos en fotmato JSON.

