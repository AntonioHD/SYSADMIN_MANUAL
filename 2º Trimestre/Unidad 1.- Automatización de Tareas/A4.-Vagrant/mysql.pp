class { '::mysql::server':
    root_password => 'strongpass',
    remove_default_accounts => false,
    restart => true
    override_options => {
      mysqld => { bind-address => '0.0.0.0'} //permitir conexiones entrantes desde cualquier ip
    }
  }

//crear una base de datos llamada `mydb`, un usuario y asignarle una contraseña
  mysql::db { 'mydb':
      user     => 'admin',
      password => 'secret',
      host     => '192.168.33.1',
    }

//asignarle todos los permisos al usuario que acabamos de crear
  mysql_grant { 'admin@192.168.33.1/*.*':
	require => Class['::mysql::server']
    ensure     => 'present',
    options    => ['GRANT'],
    privileges => ['ALL'],
    table      => '*.*',
    user       => 'admin@192.168.33.1',
  }
