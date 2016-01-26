# A1.- Tareas Programadas

***

* **Autor:**  Antonio Hernández Domínguez
* **Curso:** 2.º ASIR 2015/2016
* **Asignatura:** Administración de Sistemas Operativos
* **Unidad:** 4.ª Automatización de Tareas

***

## 1. Introducción

En la práctica planteada para comenzar esta 4.ª unidad, la cual trata sobre la **"Automatización de Tareas"**, hemos definido una serie de procesos que se ejecutarán de forma autónoma con base a unos parámetros o condiciones de tiempo preestablecidos.

Dichos procesos, denominados **"Tareas Programadas"**, son susceptibles de ser clasificados según la condición de tiempo a la que obedezcan, dando como resultado 3 grupos bien diferenciados, siendo éstos los siguientes:

* **Tareas programadas diferidas**

Éstas basan su condición de tiempo en el momento exacto que nosotros definamos, es decir, si queremos que se ejecute un proceso un día, hora o minuto concreto, y sólo una única vez, emplearemos éste tipo de tarea programada.

* **Tareas programadas periódicas**

Si queremos que una tarea se realice "periódicamente", ya sea cada mes, semana, día, etc... haremos uso de éste grupo de tareas. Un ejemplo muy común es el programado de una tarea de copia de seguridad o análisis de virus que se ejecute, por ejemplo, todos los domingos del mes.

* **Tareas programadas asíncronas**

En caso de que no tengamos claro el momento exacto pero sí el periodo de tiempo en el que queremos que se ejecute (o se vuelva a ejecutar) un proceso, utilizaremos las tareas asíncronas. Éstas se definen siguiendo el mismo esquema que en las periódicas con la salvedad de que no se especficará un momento exacto de ejecución, sino que le diremos el periodo comprendido entre una ejecución y la siguiente, y ésta se realizará en el momento que pueda, teniendo en cuenta dicho periodo.

Dichas tareas pueden basarse en la ejecución de un programa que tengamos instalado en nuestro sistema o en ejecutar un script que nosotros mismos elaboremos y que en él se recojan los procesos que creamos convenientes, según la tarea que prentendamos definir.

Para terminar esta parte introductoria cabe decir que hemos empleado un sistema operativo GNU/Linux, en concreto OpenSUSE 13.2, y un sistema operativo Windows 7 Enterprise; en los cuales hemos planificado 3 tareas programadas para cada sistema, contemplando para ello el hacer uso de una de cada tipo, cubriendo así todas las posibilidades para ambos sistemas.


## 2. Tareas Programadas en OpenSUSE

Empezaremos definiendo las tareas programadas en OpenSUSE, empleando para ello los comandos `at` para las tareas diferidas, el fichero `/etc/crontab" para las tareas periódicas y, para las tareas asíncronas, las carpetas `cron` --> `cron.hourly`, `cron.daily` y `cron.monthly`.

### 2.1. Configuraciones Previas

Siguiendo los parámetros definidos en el esquema que vemos a continuación vamos a configurar nuestra máquina:

* IP: 172.18.9.51
* Máscara de red: 255.255.0.0
* Gateway: 172.18.0.1
* Servidor DNS: 8.8.4.4
* Nombre de equipo: hernandez3
* Nombre de dominio: dominguez
* Tarjeta de red VBox en modo puente.

Vemos los parámetros previos definidos:

![](files/suse/a01.png)

A su vez, instalaremos o nos aseguraremos de que tenemos instalado los servicios `SSH`:

![](files/suse/a02.png)

### 2.2. Tarea Programada Diferida

Ahora sí, configuraremos una primera tarea programada de tipo `diferida` que se ejecutará en el momento exacto que establezcamos. Para ello hacemos uso de un script para intérpretes de comandos shell (el empleado en sistemas Unix) con el siguiente código:

```
#!bin/sh
	#Tarea programada diferida de apagado del sistema
		sudo shutodwn
```

Luego, para lanzar la tarea programada escribiremos `at` <el momento en el que queremos que se ejecute> < <y el nombre o ruta del script a ejecutar>; en nuestro caso quedaría de la siguiente manera `at 08:35am today < tareadiferida.sh`. Nos aparecerá un mensaje de tipo "Warning" con el aviso de que se ejecutará el script en cuestión, donde especificará en la siguiente línea la fecha y hora de dicha ejecución.


![](files/suse/a03.png)


En este caso nos hemos topado con un error al lanzar el comando `at`, el cual nos indica que el demonio de este comando no está funcionando por lo que escribimos ``sudo atd` para que arranque el demonio del programa y podamos establecer nuesta tarea diferida:

![](files/suse/a07.png)

Si no queremos hacer uso de un script, podemos lanzar el comando `at` en la terminal con los parámetros de fecha y hora en que queremos que se ejecute la tarea, y nos aparececerá una nueva línea debajo en la que introducir los procesos que queramos que se ejecuten para esa tarea; cuando terminemos de definir la líneas simplemente pulsamos la combinación de teclas `ctrl+d` y finalizamos la creación de la tarea:

![](files/suse/a08.png)


### 2.3. Tarea Programada Periódica

Pasamos ahora a definir una tarea programada mediante el uso del comando `crontab` o del fichero asociado al mismo `/etc/crontab`.

Este comando, o el fichero del mismo, nos permite programar tareas para realizarlas a ciertas horas, ciertos días de la semana, del mes, del año, etc... Con este comando, cada usuario puede definir sus propias tareas programadas, lanzandolo cada desde su sesión y siguiendo la siguiente sintáxis:

* `crontab -l` Mostrar las tareas programadas por el usuario.

* `crontab -e` Editar el fichero crontab. Con esto editaremos el fichero de configuración de crontab de cada usuario para poder modificar las tareas programadas.

* `crontab -r` Eliminar el fichero crontab corriente.

* `crontab -u <usuario>` Aplicar una de las opciones anteriores para un usuario determinado. Sólo root puede hacerlo.


A su vez, éste comando tiene una sintáxis específica que deberemos respetar, de manera que:

* Introduciremos una línea para cada tarea que queramos programar. 

* Y para cada línea respetaremos la composición predefinida de seis campos separados por espacios o tabuladores; estos campos son, en orden: minuto, hora, dia, mes, año, comando.

Un ejemplo sería:

* Lanzamos el comando `crontab -e` para que se nos abra el editor del fichero crontab.

* Y agregamos las siguientes líneas:

* * `#Hacer una copia de seguridad del directorio documentos cada día a las 00:00`

* * `0 0 * * * tar -czf docs-'date -I'.tar.gz /home/antonio/documentos/`

Si queremos definir una tarea periódica para todo el sistema, existe un fichero del que sólo puede hacer uso el usuario `root` destinado a tal fin; el fichero `/etc/crontab`.
Editándolo de forma manual podemos introducir en él las tareas que queremos definir. Este fichero tiene la misma sintáxis específica que en el caso del comando, con la salvedad de que después de los parámetros de tiempo agregaremos `root` como un campo más, para en el siguiente poner el comando a ejecutar.

En nuestro caso hemos optado por hacer uso de esta última opción para definir una tarea periódica del sistema.

En la captura podemos ver que se genera un script con el nombre `tareaperiodica.sh` con el siguiente código:

```
#!bin/sh
	#Añade la fecha/hora a un fichero
	date >> /home/antonio/cron.log
```

Para luego darle permisos de ejecución y lanzarlo desde la terminal para comprobar previamente que funciona de forma correcta:

![](files/suse/p01.png)

Ahora, editamos el fichero `/etc/crontab` para agregar las siguientes líneas:

* `#TAREA PROGRAMADA PARA EJECUTARSE CADA 5 MIN`
* `0-59/5 * * * * root /home/antonio/Documentos/tareaperiodica.sh`

Si nos fijamos en el primer campo de la 2º línea que hemos introducido (campo minutos), podemos ver que se ha definido para que se ejecute cada 5 minutos de reloj, dividiendo el total de minutos (0-59) entre 5 --> `0-59/5`. Con lo cual se ejecutará 12 veces por hora, a todas horas, todos los días, todos los meses y todos los años; puesto que hemos puesto `*` en el resto de campos.

![](files/suse/p04b.png)


Si nos vamos ahora al fichero `/home/antonio/cron.log`, en el que el script va a guardar la fecha y hora, vemos que efectivamente hay un registro cada 5 min:

![](files/suse/p04c.png)


### 2.4. Tarea Programada Asíncrona

Como en los casos anteriores, volvemos a crear un script llamado esta vez `tareaasincrona.sh`, en el que meteremos el siguiente código:

```
#!/bin/sh
	#Mostrar mensaje en pantalla
	DISPLAY=:0
	export DISPLAY
	zenity --info --text="Tarea ejecutada"
```

Para esta tarea prentendemos hacer uso de la herramienta `zenity`, que hemos instalado previamente, y con la que podemos definir una ventana en la que hemos establecido el texto que va a contener, como hemos hecho en el script, para luego mostrarla en pantalla.

Hemos ejecutado el script para comprobar que funciona correctamente:

![](files/suse/zen.png)

Una vez que hemos lanzado el script para ver su funcionamiento, vamos a alojar el fichero de éste en la carpeta `/etc/con.hourly` para que se ejecute de forma asíncrona cada hora.

Las carpetas de la herramienta `cron` para este tipo de tareas son:

* `cron.hourly` Para las tareas en períodos de 60 minutos
* `cron.daily` Para tareas diarias
* `cron.monthly` Para tareas mensuales
* `cron.weekly` Para tareas semanales

![](files/suse/as00.png)


***

## 3. Tareas Programadas en Windows 7 Enterprise

Para definir tareas programadas en Windows, emplearemos la herramienta administrativa `Programador de Tareas` que podemos encontrar en "Panel de control -> Herramientas administrativas -> Programador de tareas".

![](files/w7/00.png)

Para éste sistema se emplea un entorno gráfico, diferenciándose drásticamente con respecto a la programación de tareas en los sistemas GNU/Linux.

### 3.1. Configuraciones Previas

Como en el punto anterior con el sistema operativo OpenSUSE 13.2, partiremos de la configuración del sistema Windows con los siguientes parámetros:

* IP: 172.18.9.11
* Nombre de equipo: hernandez1
* Máscara de red: 255.255.0.0
* Gateway: 172.18.0.1
* Servidor DNS: 8.8.4.4
* Grupo de trabajo: AULA108
* Tarjeta de red VBox en modo puente.

![](files/w7/02.png)

### 3.2. Tarea Programada Diferida

Comenzaremos a ver el uso de la herramienta "Programador de tareas" con la creación de una tarea programada diferida que se encargue de apagar el sistema.

Una vez abierto el `Programador de tareas`, hacemos click sobre "crear una tarea...", opción que podemos encontrar en el menú "Acciones" para que se abra el asistente y comenzar a definir nuestra tarea programada:

![](files/w7/01.png)

Vemos que la ventana que nos aparece del asistente tiene 5 pestañas, por la que iremos pasando una a una para definir nuestra tarea.

En la pestaña `General` le damos un nombre a nuestra tarea, una descripción, y especificamos si queremos que se ejecute "sólo cuando el usuario haya iniciado sesión" o "tanto si ha iniciado o no". En este caso, como vamos a definir una tarea diferida que ejecutaremos en apenas unos minutos dejaremos la primera. 

![](files/w7/d1.png)

En la pestaña `desencadenadores` hacemos click en el botón "nuevo" para definir cómo y cuando se va a ejecutar la tarea en cuestión. Para éste caso vamos a iniciar la tarea "Según una programación", la cual consisitirá en que la tarea se ejecute una única vez, y que sea el día 20/01/2016 a las 9:40:06.

En el apartado de "configuración avanzada" se amplian las opciones al punto de, poder elegir el retraso para la ejecución de la tarea, si queremos que esta se repita cada cierto tiempo o si queremos que se detenga con base a un número de ejecuciones, y si debe expirar o no al cabo de una fecha y hora.

Una vez que la tengamos damos en aceptar y continuamos:

![](files/w7/d2.png)

En la pestaña `Acciones` hacemos lo mismo que en la anterior, eligiendo ahora el tipo de acción que queremos que se produzca cuando se den los parámetros "desencadenantes" de nuestra tarea.

Hemos elegido la opción "iniciar un programa" donde hemos definido que éste sea el comando "shutdown" con los parámetros "/s":

![](files/w7/d03.png)

![](files/w7/d04.png)

En la pestaña `condiciones` podemos completar lo que ya habíamos definido en la pestaña `desencadenadores`, de manera que si alguna de las condiciones que marquemos no se cumple la tarea no se ejecutará.

Para el caso hemos dejado la que viene marcada por defecto "Detenter si el equipo empieza a usar la batería":

![](files/w7/d5.png)

Y por último, en la pestaña `Configuración` podemos definir el que la tarea se pueda ejecutar o no a petición, si queremos que se ejecute lo antes posbile, si queremos que en caso de que no se ejecute ésta se reinicie, etc....Hemos dejado las opciones por defecto que no serán relevantes para la ejecución de nuestra tarea diferida.


![](files/w7/d6.png)

Una vez que hacemos click por último en aceptar, ya tendremos definida nuestra tarea donde podremos verla registrada en la carpeta "Biblioteca del Programador de tareas":

![](files/w7/d7.png)

Hemos esperado a que se cumpliera la hora desencadenante de nuestra tarea para ver si se ejecutaba correctamente. Comprobamos que sí con el siguiente aviso en forma de ventana emergente:

![](files/w7/d8.png)

### 3.3. Tarea Programada Periódica

En este apartado seguiremos los mismos pasos que en el anterior pero detallando todos aquéllos cambios, en los parámetros clave de las opciones de configuración, que veremos dadas las diferencias que existen entre una tarea periódica y una diferida.

![](files/w7/p1.png)

En este caso, definiremos en la pestaña ´desencadenadores´ que la tarea se ejecute diariamente a una hora, y que se repite cada día:

![](files/w7/p2.png)

![](files/w7/p3.png)

En `Acciones` le decimos que queremos mostrar un mensaje, y en el campo título y Mensaje introducimos lo que queremos que se muestre. En este caso hemos definido un aviso para acordarnos de que tenemos que "recoger al niño" y el tiempo del que disponemos:

![](files/w7/p4.png)

![](files/w7/p5.png)

Hemos esperado nuevamente a llegar a la hora desencadenante de la tarea para ver el resultado de nuestra tarea:

![](files/w7/p8.png)

### 3.4. Tarea Programada Asíncrona

Para acabar vamos a crear una tarea programada asíncrona con el asistente de windows, en la que realizaremos una copia de seguridad de nuestra carpeta usuario a otra que será la de respaldo.

En este caso hemos optado por crear un script con extensión `.bat` que se ejecute cuando la tarea cumpla con los parámetros desencadenantes que definamos, y en el que hemos metido los comandos para realizar la copia de seguridad que comentábamos.

![](files/w7/a0.png)

También hemos creado la carpeta para alojar la copia que se haga al lanzar el fichero, cuya ruta está definida en el script:

![](files/w7/a1.png)

Volviendo al "Programador de tareas", vamos a seguir los mismos pasos que los realizados en las tareas anterios con las siguientes diferencias.

* Se definirá la tarea de modo que se ejecute semanalmente los domingos a las 12:00.

* Con la condición (pestaña `condiciones`) de que se ésta se ejecute sólo si el equipo está inactivo durante 15 minutos.

* Y que se ejecute lo antes posible si no hubo un inicio programado (pestaña `configuración`).

![](files/w7/a2.png)

Semanalmente los domingos a las 12:00:

![](files/w7/a3.png)

Que se inicie el script `.bat` con ruta `C:\scripst_tareas\backup.bat`:

![](files/w7/a4.png)

![](files/w7/a5.png)

Con la condición de inactividad durante 15 minutos:

![](files/w7/a6.png)

* Que se ejecute lo antes posible si no hubo un inicio programado.

* Si no se ejecute que se reinicie cada 5 minutos.

* Que se intente un máximo de 100 veces.

* Y que se dentenga al cabo de 3 días.

![](files/w7/a7.png)

Por último hemos querido analizar la ventana donde se muestran todas las tareas que hemos definido para entender mejor los datos que muestra. Vemos el nombre y la descripción de la tarea, el estado en el que se encuentra (si ya se ejecutó, se va a ejecutar o si está en ejecución), la hora de próxima ejecución y las veces que se ha ejecutado, y la autoría y fecha de creación de la tarea.

![](files/w7/xx.png)