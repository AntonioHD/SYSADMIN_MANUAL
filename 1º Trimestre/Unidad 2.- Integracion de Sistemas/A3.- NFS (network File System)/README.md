# A3.- NFS (Network File System)

***

* Componentes: Antonio Hernández Domínguez - Manuel Pérez Acosta
* Curso: 2º ASIR 2015/2016
* Asignatura: Administración de Sistemas Operativos
* Unidad: 2.- Integración de Sistemas

***

## 1. Introducción

En esta tarea se ha hecho uso de otro "sistema de archivos distribuido" o "sistema de archivos de red"; en concreto, el proporcionado por el protocolo NFS (Network File System). El cual funciona a nivel de aplicación en el modelo OSI y suele ser el sistema de archivos de red que viene incluido por defecto en los Sistemas Operativos con kernel "Unix" o similar a "Unix", "Linux".

En este documento se recogen todos los pasos a seguir para implementar dicho sistema de archivos distribuido tanto en una máquina con sistema operativo Windows como en una con sistema GNU/Linux. A su vez, se ha hecho uso de clientes windows y GNU/Linux para ambos casos, esto es:

1. Un servidor NFS Windows (Windows 7 Enterprise) al que nos conectamos con un Cliente Windows.

2. Un servidor NFS Linux (OpenSUSE) al que nos conectamos con un cliente Linux.

3. Comprobamos el acceso con cliente Linux al servidor NFS Windows.

4. Comprobamos el acceso con cliente windows al servidor NFS Linux.

El desarrollo de la práctica, junto con la documentación de la misma, se ha llevado a cabo de forma conjunta por los alumnos Antonio Hernández Domínguez y Manuel Pérez Acosta. Tratando de organizar y optimizar el tiempo de realización de esta tarea, se han repartido los pasos a seguir de manera que no se excluyera a ningún integrante de la necesidad de conocer el funcionamiento del protocolo NFS en cada sistema, quedando como resultado el siguiente reparto:

* Antonio Hernández Domínguez:

 * Servidor NFS GNU/Linux OpenSUSE.
 * Cliente NFS Windows, para conectarnos al servidor NFS Windows.
 * Cliente NFS Windows, para conectarnos al servidor NFS GNU/Linux OpenSUSE.

* Manuel Pérez Acosta:

 * Servidor NFS Windows 7 Enterprise.
 * Cliente NFS GNU/Linux, para conectarnos al servidor NFS GNU/Linux OpenSUSE. 
 * Cliente NFS GNU/Linux, para conectarnos al servidor NFS Windows.

## 2. Sistema Operativo Windows

### 2.1 Servidor NFS Windows

* Configuración de red del Windows 2008 Server (Enterprise):

![](files/windowsserver/01.png)

Después de configurar los parámetros de red de nuestro servidor, vamos a proceder a la insrtalación del servicio NFS. Para ello, accedemos a `Administrador del servidor -> Roles y características (en caso de W2008S se denominan funciones) -> Servicios de Archivo -> Servicios para NFS` 

![](files/windowsserver/02.png)
![](files/windowsserver/03.png)

A continuación, vamos a configurar el servidor NFS:

* Creamos las carpetas `C:\export\public` y `C:\export\private`:

![](files/windowsserver/04.png)

* Accedemos a `Propiedades de la carpeta public -> Compartir NFS` y la configuramos para que sea accesible desde la red en modo lectura/escritura con NFS.

![](files/windowsserver/05.png)
![](files/windowsserver/06.png)

* Accedemos a `Propiedades de la carpeta private -> Compartir NFS` y la configuramos para que sea accesible desde la red en modo solamente en modo lectura con NFS.


![](files/windowsserver/07.png)
![](files/windowsserver/08.png)

Por último, ejecutamos el comando `showmount -e 172.18.7.22` para comprobar que todo ha ido correctamente y los recursos están compartidos.

![](files/windowsserver/09.png)

### 2.2 Cliente NFS Windows

![](files/cwnfs/00.png)
![](files/cwnfs/00b.png)
![](files/cwnfs/01.png)
![](files/cwnfs/02.png)
![](files/cwnfs/03.png)
![](files/cwnfs/04.png)
![](files/cwnfs/05.png)
![](files/cwnfs/06.png)
![](files/cwnfs/07.png)
![](files/cwnfs/08.png)

## 3. Sistema Operativo GNU/Linux (OpenSuse)

### 3.1 Servidor NFS OpenSUSE

En este apartado veremos los procesos que tenemos que seguir para implementar un servidor NFS en una máquina GNU/Linux. Realizaremos dicha implementación sobre un sistema operativo OpenSUSE.

Comenzamos editando el fichero ```/etc/hosts``` para agrear los nombres de los hosts de las máquinas clientes y del servidor. En este caso será:

*Para el cliente GNU/Linux, el nombre ```nfs-client-07.perez``` con dirección IPv4 ```172.18.7.62```.
*Para el servidor ```nfs-server-09.hernandez``` con dirección IPv4 ```172.18.9.52```.

![](files/susenfs/nfs00.png)

Luego, editamos las interfaces de red de manera que tenga la ip especificada:

![](files/susenfs/nfs01.png)

Lanzamos el comando ```sudo zypper --non-interactive install yast2-nfs-server``` para instalar el paquete NFS en nuestro sistema:

![](files/susenfs/nfs02.png)

Ahora, una vez instalado nuestro servidor NFS, lo iniciamos desde la herramienta panel de control "YaST". Estableceremos que se inicie dicho servicio con el arranque del sistema, y abriremos el puerto en el cortafuegos para permitir el tráfico de este protocolo:

![](files/susenfs/nfs03.png)

En este punto vamos a crear las carpetas físicas que asociaremos a los recursos que vamos a publicar en nuestro servidor NFS. Crearemos dos carpetas para comparar los permisos que posteriormente daremos desde el servidor nfs, la ruta será:
```/var/export/public``` y ```/var/export/private```:

![](files/susenfs/nfs04.png)

Los propietarios de las carpetas, así como los permisos asignados atenderán al siguiente esquema:

* La carpeta ```public``` no tendrá propietario "nobody" y pertenecerá a ningún grupo "nogroup". 
* La carpeta ```private``` tampoco tendrá propietario, y no estará asociado a algún grupo. Los permisos que tendrá serán:	
 * De Lectura, Escritura y Ejecución para el propietario (7__)
 * De Lectura, Escritura y Ejecución para el grupo (_7_)
 * Y ningúno para el resto de usuarios (__0)

![](files/susenfs/nfs04b.png)

Volviendo al servidor NFS, vamos a publicar las carpetas que hemos creado. Para ello, hacemos click en "Añadir directorio" y ponemos la ruta física de la carpeta. Luego, en la ventana inferior hacemos click en "añadir host", para añadir a esa carpeta los host permitidos (los que tendrán acceso) y con los permisos (opciones) que queramos.
Para la carpeta "public" vamos a poner a cualquier host (*) con los permisos de lectura y escritura.

*/var/export/public ```* rw,siync,subtree_check```:

![](files/susenfs/nfs05.png)

Y para el recurso "private" establecemos que el host sea la máquina cliente (nfs-client-07.perez``` dirección IPv4 ```172.18.7.62```) y los permisos serán sólo de lectura:

*/var/export/private ```* ro,siync,subtree_check```:

![](files/susenfs/nfs06.png)
![](files/susenfs/nfs07.png)
![](files/susenfs/nfs08.png)

### 3.2 Cliente NFS OpenSUSE

* Configuración de red del cliente OpenSuse:

![](files/suseclient/10.png)

* Configuración del fichero /etc/hosts (añadimos las líneas correspondientes al servidor y cliente)

![](files/suseclient/11.png)

En esta parte, comprobaremos que las carpetas compratidas desde el servidor son accesibles desde el cliente. El software del cliente NFS ya viene instalado en OpenSuse así que procederemos a realizar algunas comprobaciones para ver que todo funciona correctamente antes de montar los recursos.

Vamos a comprobar la conectividad entre el cliente y el servidor:

* Realizamos un ping al servidor para comprobar la conectividad: `ping 172.18.9.52`

![](files/suseclient/12.png)

* Realizamos un nmap para escanear que servicios se están ofreciendo al exterior: `nmap 172.18.9.52 -Pn`

![](files/suseclient/14.png)

* Realizamos un showmount para mostrar la lista de recursos exportados por el servidor NFS: `showmount -e 172.18.9.52`

![](files/suseclient/15.png)

Una vez realizadas estas comprobaciones, vamos a montar y usar cada recurso compartido.

* Creamos la carpeta `/mnt/remoto/public` y montamos el recurso:

![](files/suseclient/13.png)

![](files/suseclient/16.png)

Utilizamos el comando `df -hT` para comprobar que se ha montado el recurso:

![](files/suseclient/17.png)

* Creamos la carpeta `/mnt/remoto/private` y montamos el recurso:

![](files/suseclient/18.png)

Ahora comprobamos que desde el cliente, no puedo crear escribir dentro de private (sólo lectura) pero si de public (lectura y escritura):

![](files/suseclient/19.png)

Para terminar las comprobaciones, mi compañero ha creado un archivo en la carpeta private en el servidor para comprobar que desde el cliente no puedo escribir dentro.

![](files/suseclient/20.png)

Y efectivamente, no me deja guardar la línea que he escrito dentro del fichero, por lo tanto, todo ha funcionado correctamente.

![](files/suseclient/21.png)

### 3.3 Montaje automático

![](files/suseclient/22.png)

## 4. Preguntas finales

### 4.1. Cliente GNU/Linux y Servidor Windows (NFS)

![](files/suseclient/23.png)

### 4.2. Cliente Windows y Servidor GNU/Linux (NFS)

![](files/cwnfssuse/00.png)

nota: Se ha cambiado la ruta (\\//) de acceso a los recursos, diferencia con respecto al caso de windows a windows.

![](files/cwnfssuse/01.png)
![](files/cwnfssuse/02.png)
![](files/cwnfssuse/03.png)
![](files/cwnfssuse/04.png)
![](files/cwnfssuse/05.png)
![](files/cwnfssuse/06.png)

