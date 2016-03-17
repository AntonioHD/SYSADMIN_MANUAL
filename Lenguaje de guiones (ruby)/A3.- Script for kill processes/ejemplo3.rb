#!/usr/bin/ruby
#Encoding: utf-8
#Script crear usuarios desde .txt

system("clear")

#Especificamos que vamos a hacer uso de la gema "Rainbow"
require 'rainbow'

#Definimos el método "greet" con el argumento "name"
def greet(name)
	system("sudo adduser #{name}")#Comando para crear usuario segun valor que le pasemos al argumento del metodo
	puts "se ha creado el usuario "+Rainbow("#{name}").color(:green).bg(:black)#Mensaje de que se ha creado el usuario
end#Fin del método

#Llamados al metodo y le pasamos al argumento el valor "Alumno"
greet "Alumno"

puts "End of script"
