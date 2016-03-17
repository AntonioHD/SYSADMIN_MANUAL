class hostwindows4{
 user{'Antonio':
 ensure => 'present',
 groups => ['Usuarios']
 }

 user{'yoda':
 ensure => 'present',
 groups => ['Usuarios']
 }

 file{'C:\Users\anto':
    owner => ['Antonio'],
    group => ['Usuarios'],
    mode => 644;
 }

 file{'C:\Users\yoda':
    owner => ['yoda'],
    group => ['Usuarios'],
    mode => 644;
 }
}
