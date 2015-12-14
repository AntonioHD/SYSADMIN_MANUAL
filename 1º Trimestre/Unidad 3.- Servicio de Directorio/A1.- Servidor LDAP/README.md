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

La autenticación Kerberos la dejaremos sin habilitiar

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
