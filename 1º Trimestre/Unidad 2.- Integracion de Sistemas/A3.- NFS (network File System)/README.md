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

![](files/susenfs/nfs00.png)
![](files/susenfs/nfs01.png)
![](files/susenfs/nfs02.png)
![](files/susenfs/nfs03.png)
![](files/susenfs/nfs04.png)
![](files/susenfs/nfs04b.png)
![](files/susenfs/nfs05.png)
![](files/susenfs/nfs06.png)
![](files/susenfs/nfs07.png)
![](files/susenfs/nfs08.png)

### 3.2 Cliente NFS OpenSUSE

![](files/suseclient/10.png)
![](files/suseclient/11.png)
![](files/suseclient/12.png)
![](files/suseclient/13.png)
![](files/suseclient/14.png)
![](files/suseclient/15.png)
![](files/suseclient/16.png)
![](files/suseclient/17.png)
![](files/suseclient/18.png)
![](files/suseclient/19.png)
![](files/suseclient/20.png)
![](files/suseclient/21.png)


### 3.3 Montaje automático

![](files/suseclient/22.png)

## 4. Preguntas finales

### 4.1. Cliente GNU/Linux y Servidor Windows (NFS)

### 4.2. Cliente Windows y Servidor GNU/Linux (NFS)

![](files/cwnfssuse/00.png)

nota: Se ha cambiado la ruta (\\//) de acceso a los recursos, diferencia con respecto al caso de windows a windows.

![](files/cwnfssuse/01.png)
![](files/cwnfssuse/02.png)
![](files/cwnfssuse/03.png)
![](files/cwnfssuse/04.png)
![](files/cwnfssuse/05.png)
![](files/cwnfssuse/06.png)

