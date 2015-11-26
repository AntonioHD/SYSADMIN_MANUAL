#!/usr/bin/ruby
#Encoding: utf-8

#Antonio Hernandez Dominguez-Script instalar y desinstalar software
#Script para OpenSUSE

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

#Cargamos los nobmres de los programas en el array
software=`cat software-list.txt`
list=software.split("\n")

#Tenemos filas con 2 campos a separar, haremos uso de un bloque iterador
list.each do |softwarename|
	fields = softwarename.split(":")
	
	#Comprobamos la situación del programa, ¿está instalado?
	search=`zypper search #{fields[0]}| grep -w "^i | *"`

	#Si se especifica eliminarlo, comprobamos primero si está instalado	
	if fields[1]=="remove" || fields[1]=="r"
		if search.count==0 then
			puts "El programa "+fields[0]+" no está instalado"			
		else
			puts "El programa "+fields[0]+" está instalado, procedemos a desinstalarlo"
			system("zypper --non-interactive rm #{fields[0]}")
		end
	#si se especifica instalarlo, comprobamos que NO está instalado
	elsif fields[1]=="install" || fields[1]=="i" then
		if search.count>=1 then
			puts "El programa "+fields[0]+" NO está instalado, procedemos a instalarlo"
			system("zypper --non-interactive in #{fields[0]}")
		else
			puts "El programa "+fields[0]+" ya está instalado"
		end
	end
#Fin del iterador	
end		
puts "FIN DEL SCRIPT"
