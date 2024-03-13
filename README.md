# DeveloperMatch

**Proyecto reaalizado para la clase de ingeniería de software** 📖

El propósito de esta actividad es tratar de recrear una situación lo más acercado a la realidad del mundo laboral. Para esta actividad se desarrolló en equipo en un proyecto solicitado por otro equipo, esto tratando de simular lo que pediría un cliente real, tratando de cumplir con todas y cada una de las especificaciones solicitadas y los tiempos de entrega establecidos.

## ¿Qué es DeveloperMatch? 🤔❓

DeveloperMatch surge ante la necesidad de poder facilitar la tarea de la búsqueda de empleo a los estudiantes y egresados de los campos de la informatica y computación y así, poder darles un espacion para que los individuos sea capaces de comunicarse con empresas potenciales para incorporarse.

### Instrucciones para su ejecución:

Hasta el momento de su elaboración el proyecto solo funcionaba de manera local ya que no fue hosteado en algún proveedor ya que no era necesario.

Para comenzar deberemos de clonar el proyecto, para ellos deberemos de abrir una terminal en nuestro computador y copiar el siguiente repositorio:

```
https://github.com/Dexne/DeveloperMatch/tree/DeveloperMatch_v2
```

Es importante que la carpeta en la cual se encuentré el proyecto debe de llamarse "proyecto", de no ser así habrá problemas con los paths (deberán de actualizarse todas las rutas) y su vez, deberá de estar dentro de la carpeta "xampp/htdocs". Esta carpeta se crea por defecto en tu disco local C cuando descargas XAMPP y APACHE. Si no tienes descargado este software puedes hacerlo desde el siguiente link:

```
https://www.apachefriends.org/es/index.html
```

XAMPP es un software gratuito el cual nos proporciona herramientas de desarrollo web como lo es MySQL a través de phpMyAdmin, APACHE, Ruby, Perl, PHP, etc.

Al clonar el proyecto se descargará a su vez un archvio .sql, el cuál corresponde a una copia de la base de datos, deberemos de acceder a phpMyAdmin e importarla para poder usarla. Para poder ingresar a la página donde situaremos nuestra base de datos deberemos de iniciar en XAMPP los servicios de MySQL y Apache.
Nota: Es posible que al iniciar estos dos servicios surja un error al tratar de iniciar MySQL, esto se debe a que es posible que el puerto 3306 (El puerto de MySQL) este siendo usado, para solucionarlo basta con entrar al archivo de configuración y editar el valor del puerto por otro disponible, el 3307 por ejemplo.
Una vez corregido este error ahora si podemos entrar a phpyAdmin e importar nuestra base de datos. Podemos acceder a ella a través del siguiente enlace.

```
https://www.phpmyadmin.net/
```

A manera de una pequeña observación, la base de datos debe de ser nombrada como "Cliente01".

Finalmente, deberemos de dirigirnos a nuestro navegador preferido e ingresar al siguiente enlace:

### Link para acceder como Administrador:
 
**Email:** nuevo@gmail.com (Cuenta para pruebas)

**Contraseña:** 12345

```
http://localhost/proyecto/Admin/bienvenido.php
```

### Link para acceder como Cliente:

```
http://localhost/proyecto/Cliente/index.php
```
