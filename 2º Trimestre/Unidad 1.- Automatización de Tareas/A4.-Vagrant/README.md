# A4.- Vagrant

***

* **Autor:**  Antonio Hernández Domínguez
* **Curso:** 2.º ASIR 2015/2016
* **Asignatura:** Administración de Sistemas Operativos
* **Unidad:** 4.ª Automatización de Tareas

***

## 1. Introducción

Siguiendo en la línea de estudiar herramientas que hagan de la vida de los "SysAdmins" una feliz existencia; vamos a explicar, con el siguiente informe, el uso de un nuevo software que nos permita montar, configurar y hacer uso de máquinas virtuales, de una manera más rápida y "automatizada". La herramienta a la que hacemos alusión se denomina **"Vagrant"**.
	
Para poder comenzar con el desarrollo de éste texto se hace indispensable partir de la definición de ésta herramienta; y tener así, una idea de lo que vamos a ver a continuación:
	
>Vagrant es una herramienta para la creación y configuración de entornos de desarrollo virtualizados. Originalmente se desarrolló para VirtualBox y sistemas de configuración tales como Chef, Salt y Puppet. Sin embargo desde la versión 1.1 Vagrant es capaz de trabajar con múltiples proveedores, como VMware, Amazon EC2, LXC, DigitalOcean, etc.2 Aunque Vagrant se ha desarrollado en Ruby se puede usar en multitud de proyectos escritos en otros lenguajes, tales como PHP, Python, Java, C# y JavaScript.
>
	
## 2. Primeros Pasos con Vagrant
### 2.1. Instalación

![](screenshots/gettingstarted.gif)

![](screenshots/00.png)


### 2.2. Creando un nuevo proyecto



![](screenshots/01.png)

![](screenshots/02.png)

### 2.3. Obtención de un Box (imagen o caja)

![](screenshots/boxdonwload.gif)

![](screenshots/03.png)

![](screenshots/04.png)

![](screenshots/05.png)

### 2.4. Iniciando la máquina

![](screenshots/06.png)

![](screenshots/07.png)

![](screenshots/07b.png)

## 3. Configurando Vagrant
### 3.1. Carpetas sincronizadas
### 3.2. Redireccionamiento de los puertos


![](screenshots/08.png)

### 3.3. Otras Configuraciones

## 4. Aprovisionando nuestras máquinas
### 4.1. Aprovisionamiento mediante script

![](screenshots/09.png)

![](screenshots/09b.png)

![](screenshots/10.png)

![](screenshots/11.png)

### 4.2. Aprovisionamiento mediante Puppet

![](screenshots/12.png)

![](screenshots/13.png)

![](screenshots/14.png)

![](screenshots/15.png)

## 5. Creando nuestros Box
