class hostwindows3 {
 user { 'darth-sidius':
  ensure => 'present',
  groups => ['Administradores']
 }
 user { 'darth-maul':
  ensure => 'present',
  groups => ['Usuarios']
 }
}
