#!/usr/bin/ruby
#Encoding: utf-8
#Script eliminar usuarios desde .txt

users=`cat userslist.txt`

list=users.split("\n")

list.each do |nombreusuario|
`sudo userdel #{nombreusuario}`
puts "se ha eliminado el usuario "+nombreusuario
end

puts "End of script"
