#!/usr/bin/ruby
#Encoding: utf-8
#Script crear usuarios desde .txt

users=`cat userslist.txt`

list=users.split("\n")

list.each do |nombreusuario|
system("sudo useradd #{nombreusuario}")
puts "se ha creado el usuario "+nombreusuario
end

puts "End of script"
