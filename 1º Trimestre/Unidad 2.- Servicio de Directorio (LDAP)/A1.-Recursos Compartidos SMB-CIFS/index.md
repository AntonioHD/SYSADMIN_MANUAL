#A1.- Recursos Compartidos SMB/CIFS
***

* Autor: Antonio Hernández Domínguez
* Curso: 2º ASIR 2015/2016
* Asignatura: Administración de Sistemas Operativos
* Unidad: 2.- Integración de Sistemas

***

#1. Introducción

En esta tarea se detallan los procesos a seguir para implementar un sistema de recursos compartidos empleando el protocolo "SMB" (Server Message Block), renombrado por Microsoft a "CIFS" (Common Internet File System). 

Este protocolo de red funciona a nivel de aplicación en el modelo OSI, y nos permite compartir archivos, impresoras, unidades de almacenamiento o de disco, etc.. entre los nodos de una misma red. Se emplea en los sistemas operativos Windows por defecto y, aunque pertenezca a microsoft, también podemos implementarlo en sistemas GNU/Linux; como veremos a continuación al realizar la instalación de SAMBA (implementación libre del protocolo CIFS de Microsoft Windows) en una distribución OpenSUSE.

Como ya hemos mencionado, vamos a hacer uso de una máquina con sistema operativo GNU/Linux “OpenSUSE”, que nos hará de equipo servidor de los recursos compartidos; será la máquina en la que implementaremos el paquete SAMBA. Y como clientes de ésta, emplearemos una máquina con sistema operativo Windows, y otra también con OpenSUSE, de manera que hagan uso de los recursos compartidos publicados por la máquina servidor.

#2. Configuraciones Previas

Para empezar configuraremos el servidor OpenSUSE con el nombre de equipo “samba-server”, y añadiremos los nombres de host de las máquinas clientes, “samba-client1” y “samba-client2-09”, al fichero de sistema "/etc/hosts". Como nombre de dominio introduciremos nuestro segundo apellido (Dominguez) y como nombre de usuario y clave, nuestro nombre y número de dni, respectivamente. La ip del servidor será la ```172.18.9.53/16```:

![info](files/00.png)

![info](files/05.png)

#3. Usuarios Locales

Para hacer uso de los recursos compartidos vamos a emplear 3 grupos de usuarios a los que les daremos distintos permisos en las carpetas que compartamos, para ver su comportamiento una vez accedamos desde los clientes. La estructura de grupos/usuarios se definirá de la siguiente manera:

* Un usuario ```smbguest``` que no pertenecerá a algún grupo y que modificaremos en el fichero ```/etc/passwd```, para que nadie pueda hacer uso de él a la hora de querer entrar en nuestro sistema. 

* Grupo ```jedis```, en el que agregaremos los usuarios: ```jedi1```, ```jedi2``` y ```supersamba```.

* Grupo ```sith```, en el que agregaremos los usuarios: ```sith1```, ```sith2``` y ```supersamba```.

* Grupo ```starwars```, en el que agregaremos a todos los usuarios de los 2 grupos anteriores y al usuario ```smbguest```.

Veamos primero la creación de los grupos:

![group](files/01.png)

Ahora la creación de usuarios, en este caso desde YaST, aunque podíamos haberlo hecho también por comandos:

![users](files/02.png)

Y por último la asignación de los usuarios a cada grupo:

![groupusers](files/03.png)

Finalmente, editamos el fichero ```/etc/passwd```, el cual contiene los datos que determinan quien puede acceder al sistema de manera legitima y que se puede hacer una vez dentro del sistema. En el tenemos registrados las cuentas de usuarios, asi como las claves de accesos y privilegios, entre otros datos. En esta ocasión nos interesa el que ocupa el último campo ```/bin/bash```, ya que determina el interprete de comando del que va a hacer uso ese usuario.

Editamos el fichero y en el registro del usuario ```smbguest```, último campo (recordemos que están separados por ":"), cambiamos el ```/bin/bash``` por ```/bin/false```, de manera que no pueda tener acceso a dicho interprete de comandos:

![block](files/04.png)

#4. Instalamos Samba

En la máquina servidor instalamos el paquete samba en caso de que éste no venga por defecto. Para ello lanzamos el comando ```apt-get install -y samba samba-common smbclient samba-doc cifs-utils```.

##4.1. Configuraciones

Ahora, buscamos desde la herramienta de panel de control YaST el servidor Samba y lo iniciamos. Nos aparecerá una ventana con diversas pestañas donde podremos configurar el serivdor a nuestro antojo, y ver los recursos que vamos a compartir.

En primer lugar seleccionaremos dentro de la pestaña "Inicio" la opción de "Inicio del servicio" --> "Durante el arranque". Y más abajo, en la opción de "Ajustes del cortafuegos" selccionaremos la casila de "Puerto abierto en el cortafuegos" para que permita el tráfico de los paquetes que tengan que ver con las comunicaciones que se den al hacer uso del protocolo CIFS:

![sambaconf](files/07.png)

En la pestaña "Identidad" establecemos como nombre de dominio nuestro segundo apellido (Error en la captura al poner "starwars", el espíritu del maestro Qui-Gon se ha hecho ver):

![sambaconf](files/06.png)

Más adelante volveremos a esta herramienta de entorno gráfico para ver los recursos compartidos que vamos a establecer. 

##4.2. Creación de Recursos Compartidos

En este apartado realizaremos la creación de las carpetas así como las configuraciones pertinentes para que las mismas formen parte de los recursos compartidos que queremos implementar.

Para empezar creamos la carpeta ```samba``` dentro de la ruta ```/var```. Luego, alojamos las carpetas ```public.d```, ```corusant.d``` y ```tatooine.d```. Estas carpetas serán las que formen los recursos compartidos de nuestro servidor samba, a la cuales les daremos permisos según el grupo que queramos que tenga acceso.

El esquema de permisos vendría a ser el siguiente:

* Public.d:
 * Pertenecerá al usuario ```supersamba``` y al grupo ```starwars```. Recordemos que éste último engloba a todos los usuarios que habíamos creado.

* Corusant.d:
 * Pertenecerá al usuario ```supersamba``` y al grupo ```siths```.

* Tatooine.d:
 * Pertenecerá al usuario ```supersamba``` y al grupo ```jedis```.

![folders](files/08.png)

Los permisos para cada carpeta en base al usuario propietario, grupo de usuarios y resto de usuarios serán los siguientes:

* Public.d:
 * Tendrá todos los permisos (lectura, escritura y ejecución) para el usuario y grupo propietario (77_) y de lectura y ejecución para el resto de usuarios (__5).

* Corusant.d:
 * Tendrá todos los permisos (lectura, escritura y ejecución) para el usuario y grupo propietario (77_) y ninguno para el resto de usuarios (__0).

* Tatooine.d:
 *  Tendrá también todos los permisos (lectura, escritura y ejecución) para el usuario y grupo propietario (77_) y ninguno para el resto de usuarios (__0).

![permisefolders](files/09.png)

![sharefolders](files/10a.png)

![sharefolders](files/10b.png)

##4.3. Comprobaciones


![](files/11.png)
![](files/11b.png)
![](files/12.png)
![](files/13.png)
![](files/14.png)
![](files/15.png)



#5. Clientes Windnows

##5.1. Mediante Entorno Gráfico (GUI)
##5.2. Mediante Comandos

#6. Cliente GNU/Linux
##6.1. Mediante Entorno Gráfico (GUI)
##6.2. Mediante Comandos
##6.3. Montaje Automático

#7. Preguntas Finales

¿Las claves de los usuarios en GNU/Linux deben ser las mismas que las que usa Samba?
¿Puedo definir un usuario en Samba llamado sith3, y que no exista como usuario del sistema?
¿Cómo podemos hacer que los usuarios sith1 y sith2 no puedan acceder al sistema pero sí al samba? (Consultar /etc/passwd)
Añadir el recurso [homes] al fichero smb.conf según los apuntes. ¿Qué efecto tiene?





![](files/16a.png)
![](files/16b.png)
![](files/17.png)
![](files/18.png)
![](files/19.png)
![](files/20.png)
![](files/21.png)
![](files/22.png)
![](files/23.png)
![](files/24.png)
![](files/25.png)
![](files/26.png)
![](files/27.png)
![](files/28.png)
![](files/29.png)
![](files/30.png)
![](files/31.png)
![](files/32.png)
![](files/33.png)
![](files/34.png)
![](files/35.png)
![](files/36.png)
![](files/37.png)
![](files/38.png)
![](files/39.png)
![](files/40.png)

