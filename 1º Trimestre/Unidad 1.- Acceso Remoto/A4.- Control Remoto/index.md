#A4.- ESCRITORIO REMOTO
###Participantes del grupo:
* Antonio Hernández Domínguez
* Michele Ignacio Linares D'onofrio
* Miriam Rodríguez Méndez

***

#1. Introducción

<p align=justify>
	En esta actividad hemos utilizado varias herramientas de escritorio remoto con las que poder controlar los equipos de forma remota, 
	instalando estos servicios en las máquinas a controlar (máquinas servidoras) y proporcionando las configuraciones necesarias para poder 
	acceder desde los clientes (controladores) de los mismos. Resulta interesante el funcionamiento de este tipo de software si pensamos en 
	una gran topología de red en la que converjan miles de equipos y sólo se disponga de un único técnico encargado de todos ellos, se ahorraría 
	el engorro de realizar tareas de forma local en cada una de esas máquinas por lo que el escritorio remoto le permite tener a sus disposición 
	todas las máquinas, que tengan instalado previamente dicho software, para ser controladas y gestionadas de forma más eficiente.
</p>
***

#2. Conexión escritorio remoto (VNC)
En éste punto haremos uso del software de escritorio remoto "VNC" (Virtual Network Computing). Lo característico de este programa es que no impone restricciones
en el sistema operativo del ordenador servidor con respecto al del cliente; por lo que es posible compartir la pantalla de una máquina con cualquier sistema operativo 
que soporte VNC conectándose desde otro ordenador o dispositivo que disponga de un cliente VNC.
***
##1. Windows a Windows
En primer lugar, probaremos a realizar la instalación y configuraciónen un máquinas windows, y accederemos desde otra con el mismo sistema operativo. Para ello, utilizaremos
el programa "TightVNC", que descargaremos desde su página oficial: [url página oficial](http://www.tightvnc.com/download.php).
###2.1.1. Configuración servidor de escritorio remoto
Una vez descargado el fichero .msi, lo iniciamos y empezamos la instalación:

![VNC](files/VNC/02.png)

Aprovecharemos que nos da la opción de instalar tanto el software para cliente como para servidor.

![VNC](files/VNC/03.png)

###2.1.2. Conexión desde cliente Windows
Ahora, una vez instalado en el cliente el software para escritorio remoto de "tightVNC", ponemos la dirección de la máquina servidora, la máquina a la que conectarnos y hacemos click sobre "connect":

![VNC](files/VNC/04.png)

Comprobamos con el comando ```netstat``` (network statistics) para ver las conexiones activas y ver el servicio en funcionamiento:

![VNC](files/VNC/01.png)
***

##2.2. Windows a Linux
###2.2.1. Configuración servidor de escritorio remoto
![VNC](files/VNC/05.png)
![VNC](files/VNC/06.png)
###2.2.2. Conexión desde cliente Windows
![VNC](files/VNC/07.png)
![VNC](files/VNC/08.png)
***

##2.3. Linux a Windows
###2.3.1. Configuración servidor de escritorio remoto
![VNC](files/VNC/02.png)
![VNC](files/VNC/03.png)
![VNC](files/VNC/04.png)
###2.3.2. Conexión desde cliente Linux
![VNC](files/VNC/09.png)
***

##2.4. Linux a Linux
###2.4.1. Configuración servidor de escritorio remoto
![VNC](files/VNC/05.png)
![VNC](files/VNC/06.png)
###2.4.2. Conexión desde cliente Linux
![VNC](files/VNC/10.png)
***

#3. Conexión escritorio remoto (RDP)

***
##3.1. Windows Server a Windows 7 
###3.1.1. Configuración servidor de escritorio remoto
###3.1.2. Conexión desde cliente Windows
***

##3.2. Windows 7 a Linux
###3.2.1. Configuración servidor de escritorio remoto
###3.2.2. Conexión desde cliente Windows
***

##3.3. Linux a Windows 7
###3.3.1. Configuración servidor de escritorio remoto
###3.3.2. Conexión desde cliente Linux
***

#4. Conexión escritorio remoto (Terminal Server)
