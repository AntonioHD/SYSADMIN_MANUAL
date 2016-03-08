#!/usr/bin/ruby
#Encoding: utf-8
#
#Antonio Hernandez Dominguez-Script eliminar determinados procesos
#Script para OpenSUSE
#
#Empezaremos definiendo una función con la que distinguir los procesos y su funcionamiento en base lo establecido en el fichero .txt
#La función tendrá 2 argumentos, uno para la acción a ejecutar para el proceso y otro para el nombre del mismo
def processplit(action,name)

	# Si se define en la lista negra que el proceso se debe eliminar
	if action=="remove" || action=="r"|| action=="kill"|| action=="k"
	
		#Comprobamos la situación del proceso, ¿está en ejecución?
		search=`ps -ef| grep #{name}| grep -v color| grep -v grep`
	
		#Spliteamos el resultado para sacar cada fila
		searchpid=search.split("\n")
		
		#Definimos un nuevo iterador para que nos saque el número pid de cada proceso
		searchpid.each do |processespid|
			processespid=processespid.split(" ")
			
			puts "El proceso "+Rainbow("#{processespid[7]}").color(:yellow)+" cuyo PID es "+Rainbow("#{processespid[1]}").color(:red)+" está en ejecución, procedemos a eliminarlo"
			
			#Si el proceso en ejecución coincide con el que se pretende eliminar
			if name == processespid[7] then
				system("kill -9 #{processespid[1]}")
			end
			#Fin de la condición
		end
		#Fin del iterador
	end
	#Fin de la condición
	if action=="notify" || action=="n" then
		#Comprobamos la situación del proceso, ¿está en ejecución?
		search=`ps -ef| grep #{name}| grep -v color| grep -v grep`
	
		#Spliteamos el resultado para sacar cada fila
		searchpid=search.split("\n")
		
		#Definimos un nuevo iterador para que nos saque el número pid de cada proceso
		searchpid.each do |processespid|
			processespid=processespid.split(" ")
			
			puts "El proceso "+Rainbow("#{processespid[7]}").color(:yellow)+" cuyo PID es "+Rainbow("#{processespid[1]}").color(:green)+" está en ejecución"
		end
	
	end
	#Fin de la condición
end
#Fin de la definición de la función
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------
#En las siguientes líneas ejecutaremos varias órdenes de entre las cuales estará la llamada a la función, pasandole el contenido del fichero .txt a los argumentos
#
#Limpiamos el prompt
system("clear")

#Especificamos que vamos a hacer uso de la gema "Rainbow"
require 'rainbow'

#Comprobamos usuario root
usuario=`whoami`
quiensoy=usuario.chop

if quiensoy=="root" then
	puts "EMPIEZA EL SCRIPT"
	puts "-"*50
else
	puts "PERMISO DENEGADO, NO ERES USUARIO ROOT"
	puts "TERMINA EL SCRIPT"
	exit
end

#Cargamos los nombres de los procesos en el array
software=`cat processes-black-list.txt`
list=software.split("\n")
system("touch state.running")

#Mientras exista el fichero state.running
while(File.exist?"state.running") do

	#Tenemos filas con 2 campos a separar, haremos uso de un bloque iterador
	list.each do |processesname|
		fields = processesname.split(":")
		processplit(fields[1], fields[0])
	end
	sleep 5
end

puts "FIN DEL SCRIPT"
