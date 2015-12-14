# A1.- Servidor LDAP 

***

* **Autor:**  Antonio Hernández Domínguez
* **Curso:** 2.º ASIR 2015/2016
* **Asignatura:** Administración de Sistemas Operativos
* **Unidad:** 3.ª Servicio de Directorio

***

## 1. Introducción

Para la tarea que se nos presenta hemos redactado el siguiente informe con los procesos necesarios para montar un "servidor" de cuentas y grupos ó, llamado a su vez, "servicio de directorio"; basado en el protocolo "LDAP" (Lightweight Directory Access Protocol).

Para entender mejor este protocolo hay que partir de la definición de "servicio de directorio":

>*Aplicación o conjunto de éstas que almacena y organiza la información sobre los usuarios de una red de ordenadores y sobre los recursos de red, que permite a los administradores gestionar el acceso de usuarios a los recursos sobre dicha red. Hace uso de una base de datos denominada "directorio" para el almacenamiento de dicha información.*


Esta base de datos suele estar optimizada para "operaciones de búsqueda", filtrado y lectura más que para operaciones de inserción o transacciones complejas.

En el caso del procolo LDAP, éste se rige por el estándar "X.500", tal vez el más conocido y está diseñado para operar directamente sobre los protocolos TCP/IP; y permite el acceso a la información del directorio mediante un esquema clienteservidor, donde uno o varios servidores mantienen la misma información de directorio y los clientes realizan consultas a cualquiera de ellos. Ante una consulta concreta de un cliente, el servidor contesta con la información solicitada y/o con un "puntero" donde conseguir dicha información o datos adicionales (normalmente, el "puntero" es otro servidor de directorio).

## 2. Servidor LDAP en OpenSUSE

Empezaremos configurando nuestro servicio de directorio LDAP en una máquina OpenSUSE, estableceremos los parámetros de red necesarios como dirección IP, nombre de equipo, nombre de host, dominio... e instalaremos los paquetes necesarios para montar nuestro servicio de directorio. 

### 2.1. Configuraciones previas


![](files/server/01.png)
![](files/server/02.png)

### 2.2. Instalación y configuración de LDAP

![](files/server/00.png)

![](files/server/03.png)

![](files/server/04.png)

![](files/server/05.png)

![](files/server/06.png)

![](files/server/07.png)

![](files/server/08.png)

![](files/server/09.png)

![](files/server/10.png)

![](files/server/11.png)


### 2.3. Creación de gurpos/usuarios LDAP



![](files/server/12.png)
![](files/server/13.png)
![](files/server/14.png)
![](files/server/15.png)
![](files/server/16.png)
![](files/server/17.png)
![](files/server/18.png)
![](files/server/19.png)

---

![](files/client/00.png)
![](files/client/01.png)
![](files/client/02.png)
![](files/client/03.png)
![](files/client/04.png)
![](files/client/05.png)
![](files/client/06.png)
![](files/client/07.png)
![](files/client/s0.png)
![](files/client/s1.png)
