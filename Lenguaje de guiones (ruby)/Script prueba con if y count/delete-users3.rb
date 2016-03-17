#!/usr/bin/ruby
#Encoding: utf-8

#Antonio Hernandez Dominguez-Script eliminar usuarios desde .txt o .data

system("clear")

#Cargamos los usuarios de los ficheros en un array
users=`cat userslist*`
list=users.split("\n")

#verificamos que se han cargado en el arrray y que los ficheros no estaban vacios
if list.count==0
   puts "no existen usuarios en el array"
   puts "fin del script"
   exit
end

#Eliminamos los usuarios contenidos en el array del sistema
list.each do |nombreusuario|
  `sudo userdel #{nombreusuario}`
  puts "se ha eliminado el usuario "+nombreusuario
end

puts "End of script"
