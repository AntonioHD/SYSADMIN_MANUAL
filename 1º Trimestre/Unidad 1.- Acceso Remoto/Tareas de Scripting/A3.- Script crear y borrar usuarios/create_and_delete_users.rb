#!/usr/bin/ruby
#Encoding: utf-8

#Antonio Hernandez Dominguez-Script crear eliminar usuarios

system("clear")

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

#Cargamos los usuarios en el array
users=`cat userslist.txt`
list=users.split("\n")

#Tenemos filas con 4 campos a separar, haremos uso de un bloque iterador
list.each do |nombreusuario|
	campos = nombreusuario.split(":")

	#Tenemos las filas separadas por campos, usamos condición de correo
	if campos[2]=="" then
		puts "El usuario "+campos[0]+" no tiene correo"
		puts "No hacemos nada"
		puts "-"*50
	else

		#El Usuario tiene correo y no cumple la condición, continua
		puts "-"*50
		puts "¿Qué hacemos con el usuario "+campos[0]+"?: "+campos[4]
	
		#Si en el campo 4 tiene como accion add, añadimos el usuario
		if campos[4]=="add" then
			puts "Agregamos el usuario "+campos[0]
			`useradd #{campos[0]}`
			puts "-"*50
		else

			#Sino se da la condición anterior y tiene delete, eliminamos
			if campos[4]=="delete" then
				puts "Eliminamos el usuario "+campos[0]
				`userdel #{campos[0]}`				
				puts "-"*50
			end	
		end
	end
#Fin del iterador
end
puts "FIN DEL SCRIPT"
