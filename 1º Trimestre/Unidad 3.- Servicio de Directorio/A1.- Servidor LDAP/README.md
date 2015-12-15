# A1.- Servidor LDAP 

***

* **Autor:**  Antonio Hernández Domínguez
* **Curso:** 2.º ASIR 2015/2016
* **Asignatura:** Administración de Sistemas Operativos
* **Unidad:** 3.ª Servicio de Directorio

***

## 1. Introducción

Para la tarea que se nos presenta hemos redactado el siguiente informe con los procesos necesarios para montar un "servidor" de cuentas y grupos (entre otro tipo de información de dichas cuentas) que nos permita centralizar las credenciales de los usuarios de una red en un único sitio; es decir, montaremos lo que se conoce como "servicio de directorio".
Haremos uso de un "servicio de directorio" basado en el protocolo "LDAP" (Lightweight Directory Access Protocol).

Para entender mejor este protocolo hay que partir de la definición de "servicio de directorio":

>*Aplicación o conjunto de éstas que almacena y organiza la información sobre los usuarios de una red de ordenadores y sobre los recursos de red, que permite a los administradores gestionar el acceso de usuarios a los recursos sobre dicha red. Hace uso de una base de datos denominada "directorio" para el almacenamiento de dicha información.*


Esta base de datos suele estar optimizada para "operaciones de búsqueda", filtrado y lectura más que para operaciones de inserción o transacciones complejas.

En el caso del procolo LDAP, éste se rige por el estándar "X.500", tal vez el más conocido y está diseñado para operar directamente sobre los protocolos TCP/IP;  permite el acceso a la información del directorio mediante un esquema cliente/servidor, donde uno o varios servidores mantienen la misma información de directorio y los clientes realizan consultas a cualquiera de ellos. Ante una consulta concreta de un cliente, el servidor contesta con la información solicitada y/o con un "puntero" donde conseguir dicha información o datos adicionales (normalmente, el "puntero" es otro servidor de directorio).

## 2. Servidor LDAP en OpenSUSE

Empezaremos configurando nuestro servicio de directorio LDAP en una máquina OpenSUSE, estableceremos los parámetros de red necesarios como dirección IP, nombre de equipo, nombre de host, dominio... e instalaremos los paquetes necesarios para montar nuestro servicio de directorio. 

### 2.1. Configuraciones previas

Establecemos los parámetros siguientes para nuestra máquina servidor:

* Dirección IPv4: 172.18.9.51/16

* Como nombre de host: ldap-server-09

* Como dominio: Curso1516

![](files/server/01.png)

Introducimos también varios nombres de hosts que indetifiquen nuestra máquina, editando el fichero `/etc/hosts`.

Los nombres que resolveran la IP de nuestra máquina servidor serán:

* 127.0.0.2 --> ldap-server-09.curso1516 ldap-server-09
* 172.18.9.51 --> ldap-server-09.curso1516 ldap-server-09
* 127.0.0.3 --> antonio09.curso1516 antonio09


![](files/server/02.png)

### 2.2. Instalación y configuración de LDAP

Descargamos desde la herramienta YaST iniciando el "Software Manager" (instalar/desisntalar software"), el paquete `yast2-auth-server;` el cual contiene el software necesario para la implementación del servicio de directorio LDAP:

![](files/server/00.png)

Una vez instalado, comprobamos que aparece en YaST los "servicios de red" `Authentication Sever` y `OpenLDAP MirrorMode`:

![](files/server/03.png)

Iniciamos el "Auhentication Server" y se nos abrirá una ventana en la que se nos pide que instalemos los paquetes "Openldap2", "krb-server" y "krb5-client". Damos en instalar y seguimos:

![](files/server/04.png)

Una vez instalados los paquetes que se nos requerían, se abrirá la ventana de configuración con los "Ajustes generales". Seleccionamos que se inicie el servidor LDAP y que el puerto del que va a hacer uso, y por el que va a transmitir la información de las credenciales de los usuarios ldap, esté abierto en los ajustes del cortafuegos:

![](files/server/05.png)

Como "Tipo de servidor" elegiremos la opción de "Servidor autónomo":

![](files/server/06.png)

En la siguiente ventana del asistente para la configuración de LDAP nos da la opción de habilitar el protocolo "TLS", el cual se emplea para encriptar las transmisiones. En esta ocasión lo dejaremos deshabilitado:

![](files/server/07.png)

Ahora, elegiremos el tipo de base de datos de la que va a hacer uso el servicio de directorio, en este caso la "HDB". Luego, como dicho servicio debe tener una base a partir de la cual cuelgan el resto de elementos; como nombre de la base (DN) especificaremos lo siguiente:

* dc=antonio09, dc=curso1516

Como DN de administrador ponemos:

* cn=Administrator

Especificamos la contraseña del administrador y, para acabar, la carpeta física que vamos a emplear como directorio de la base de datos:

* /var/lib/ldap

![](files/server/08.png)

La autenticación Kerberos la dejaremos sin habilitar. Ésta autenticación, basada en el protocolo Kerberos, permite a dos ordenadores en una red insegura demostrar su identidad mutuamente de manera segura:

![](files/server/09.png)

Para finalizar la configuración de nuestro servicio de directorio se nos mostrará una ventana "resumen" con todos los parámetros que hemos ido especificando:

![](files/server/10.png)

Para asegurarnos de que el servicio de red esté activo, lanzaremos los comandos `sudo systemctl start slapd` para arrancar dicho servicio, y `sudo systemctl status slapd` para verificar su estado:

![](files/server/11.png)

### 2.3. Creación de grupos/usuarios LDAP

En este punto crearemos los distintos grupos y usuarios que coexistirán en la base de datos de nuestro servicio LDAP. Para ello, nos vamos nuevamente a la herramienta "YaST" y en "Administración de Usuarios y grupos", crearemos los usuarios y los grupos estableciendo el filtro "LDAP" para ambos casos.

En primer lugar nos vamos a "Usuarios", y damos en "Definir filtro" --> "Usuarios LDAP". Luego, haciendo click en "Añadir" especificiamos uno a uno los usuarios que queremos integrar en la base de datos junto con su contraseña:

Crearemos las siguientes cuentas:

* Jedi21
* Jedi22
* Sith21
* Sith22

![](files/server/12.png)

Cuando demos en "añadir" se nos pedirá que ingresemos la contraseña de nuestro servidor LDAP para la base de datos que teníamos especificada, iniciando con el usuario "administrator":

![](files/server/13.png)

Aquí vemos la creación del usuario "jedi21":

![](files/server/14.png)

Una vez los hayamos creado todos nos aparecerán como "usuarios LDAP":

![](files/server/15.png)

Ahora, haremos lo mismo que en el paso anterior pero con los grupos; especificando nuevamente el filtro como "grupos LDAP", para luego hacer click en "añadir". Nos aparecerá la siguiente ventana donde podremos, a la vez que creamos el grupo, especificar los miembros del mismo.

Crearemos los grupos:

* jedis2
* sith2

![](files/server/16.png)

Comprobamos que están definidos correctamente:

![](files/server/17.png)

### 2.4. Unidades Organizativas LDAP

Para ver el árbol de usuarios, grupos y unidades organizativas que tenemos, una vez creados los grupos y los usuarios, descargaremos el paquete "Cliente LDAP" llamado "gq":

![](files/server/18.png)

Vemos que existen las unidades organizativas `group` y `people`, y que para la unidad organizativa "group" se han añadido los grupos `jedis2` y `sith2`.
Y que en la unidad organizativa "people" se encuentran todos los usuarios LDAP: `jedi21, jedi22, sith21 y sith22`:

![](files/server/19.png)

## 3. Cliente LDAP

En este punto realizaremos los procesos pertinentes para poder comprobar que el acceso con los usuarios LDAP que hemos establecido en puntos anteriores se realiza correctamente. 

En primer lugar, instalaremos el paquete `yast2-auth-client` para configurar el acceso con los usuarios LDAP asociados al dominio "curso1516" y a la base de datos que contiene a dichos usuarios.

Para su instalación haremos uso nuevamente del "instalador/desisntalador de software" que encontramos en YaST:

![](files/client/00.png)

Vemos que nos aparece como servicio de red la herramienta "Authentication Client", la iniciamos:

![](files/client/01.png)

Una vez en la venta de configuración del cliente de autenticación, hacemos click en "añadir" y especificamos el nombre de dominio --> `curso1516`, el proveedor de la **identificación** usada por el dominio --> `ldap` y por último, el proveedor de la **autenticación** usada por el dominio, también -->`ldap`. Terminamos con darle en "Aceptar" y se nos creará el dominio de autenticación;

![](files/client/02.png)

![](files/client/03.png)

Ahora, si hacemos click en "Editar" podemos especficiar (a parte de los proveedores de identificación y autenticación que ya habíamos establecido) el esquema ldap y su uri ('idetificador de Recurso Uniforme'); el cual definiremos con uno de los nombres de host que apunten a nuestra máquina servidor de LDAP seguido del puerto del que va a hacer uso, el 389:

* **ldap://ldap-server-09.curso1516:389**

![](files/client/04.png)

Una vez terminada la configuración del dominio de aunteticación, trataremos de iniciar sesión de forma local con uno de los usuarios LDAP que hemos implementado.

En este punto nos hemos topado con que, al lanzar el comando "su" y la cuenta de usuario ldap --> `su jedi21`, introducimos la contraseña **correctamente** y nos salta el mensaje siguiente:

`El servicio de autenticación no puede recuperar la información de auteticación`

Al probar a iniciar la sesión desde una terminal como `superusuario`, saltándonos el proceso de introducción de contraseña y verificación de la misma para el usuario `jedi21`, vemos que **sí** podemos iniciar la sesión con éste:

![](files/client/05.png)

Comprobado lo anterior, se ha llegado a la cuenta de que existe algún error o laguna en las configuraciones de autenticación o identificación de los servicios de LDAP junto con el cliente del mismo y el método de encriptación de las claves del sistema operativo. Siendo un posible problema el hecho de que la encriptacion de las claves sea diferente al utilizado en el servidor LDAP, imposibilitando el reconocimiento de las credenciales para nuestros usuarios de LDAP.
