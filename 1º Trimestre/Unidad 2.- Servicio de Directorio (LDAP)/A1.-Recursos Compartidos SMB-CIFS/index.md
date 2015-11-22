#A1.- Recursos Compartidos SMB/CIFS (OpenSUSE)

***

* Autor: Antonio Hernández Domínguez
* Curso: 2º ASIR 2015/2016
* Asignatura: Administración de Sistemas Operativos
* Unidad: 2.- Integración de Sistemas
***

#1. Introducción

En esta tarea se detallan los procesos a seguir para implementar un sistema de recursos compartidos empleando para ello el protocolo "SMB" (Server Message Block), renombrado por Microsoft a "CIFS" (Common Internet File System). 

Este protocolo de red funciona a nivel de aplicación en el modelo OSI, y nos permite compartir archivos, impresoras, unidades de almacenamiento o de disco, etc.. entre los nodos de una misma red. Se emplea en los sistemas operativos Windows por defecto y, aunque pertenezca a microsoft, también podemos implementarlo en sistemas GNU/Linux; como veremos a continuación al realizar la instalación de SAMBA (implementación libre del protocolo CIFS de Microsoft Windows) en una distribución OpenSUSE.

Como ya hemos mencionado, vamos a hacer uso de una máquina con sistema operativo GNU/Linux “OpenSUSE”, que nos hará de equipo servidor del los recursos compartidos; será la máquina en la que implementaremos el paquete SAMBA.

Y como clientes de ésta, emplearemos una máquina con sistema operativo Windows, y otra también con OpenSUSE, de manera que serán las que hagan uso de los recursos compartidos publicados por la máquina servidor.

#2. Configuraciones Previas

Para empezar configuraremos el servidor OpenSUSE con el nombre de equipo “samba-server”, y añadiremos los nombres de host de las máquinas clientes, “samba-client1” y “samba-client209”.

#3. Usuarios Locales

Para hacer uso de los recursos compartidos vamos a emplear 2 grupos de usuarios a los que les daremos distintos permisos en las carpetas que compartamos para ver su comportamiento una vez accedamos desde los clientes. La estructura de grupos/usuarios se definiría de la siguiente manera:

* Un usuario ```smbguest``` que no pertenecerá a algún grupo y que modificaremos en el fichero ```/etc/passwd```, para que nadie pueda hacer uso de él a la hora de querer entrar en nuestro sistema. 

* Grupo ```jedis```, en el que agregaremos los usuarios: ```jedi1```, ```jedi2``` y ```supersamba```.

* Grupo ```sith```, en el que agregaremos los usuarios: ```sith1```, ```sith2``` y ```supersamba```.

* Grupo ```starwars```, en el que agregaremos a todos los usuarios de los 2 grupos anteriores y al usuario ```smbguest```.

#4. Instalamos Samba

##4.1. Configuraciones
##4.2. Creación de Recursos Compartidos
##4.3. Comprobaciones

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

![](files/00.png)
![](files/01.png)
![](files/02.png)
![](files/03.png)
![](files/04.png)
![](files/05.png)
![](files/06.png)
![](files/07.png)
![](files/08.png)
![](files/09.png)
![](files/10a.png)
![](files/10b.png)
![](files/11.png)
![](files/11b.png)
![](files/12.png)
![](files/13.png)
![](files/14.png)
![](files/15.png)
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

