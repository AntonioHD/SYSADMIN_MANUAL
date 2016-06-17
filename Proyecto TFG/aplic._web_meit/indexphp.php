<?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $dbName = "meit";

    $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database

    //FORMULARIO PARA LOGUEARTE CON UN USUARIO YA EXISTENTE
    if (isset($_POST['btnLogin'])){//si se pulsa el botÃ³n de login..
    	if ((isset($_POST['username'])) && (isset($_POST['password']))){//si tanto el nombre de usuario como la contraseÃ±a estÃ¡n introducidos...
            $query = $connect -> prepare("SELECT * FROM usuarios");//preparamos la consulta para sacar la info de la base..
            $query -> execute(array());//ejecutamos dicha consulta..
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row){//por cada fila sacamos los resultados
                if (($_POST['username'] == $row['usuario']) && ($_POST['password'] == $row['clave'])){//para ahora compararlos..
                        if($_POST['password'] == $row['clave']){
                            $user="root";
                            $pwd="root";
                            $host="localhost";
                            $dbName = "meit";
                            $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database
                            if ($connect){
                            session_start();
                                $_SESSION['username'] = $_POST['username'];
                                $_SESSION['user'] = 'guest';
                                $_SESSION['pwd'] = 'guest';
                                $_SESSION['loggedin'] = time();
                                header ('Location: user.php');
                                $connect = null;
                            }
                    }
                }//cerrar if
            }//cerrar foreach
        }//cerrar if
    }//cerrar if
    elseif (isset($_POST['btnLogin'])){
        if ((!isset($_POST['username'])) || (!isset($_POST['password']))){
            echo "<h3>Rellenar los campos</h3>";//si no se ha rellenado ni usuario ni contraseÃ±a que salga mensaje informativo
        }
    }
    

    
     $connect = null;//cerramos conexión
     
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $dbName = "meit";

    $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database
    
    //FORMULARIO PARA REGISTRARTE COMO UN NUEVO USUARIO
    if (isset($_POST['btnRegister'])){
        if ((isset($_POST['username2'])) && (isset($_POST['email'])) && (isset($_POST['password2']))){
            $query = $connect -> prepare("SELET count(usuario) FROM usuarios");
            $query -> execute();
            if ($query->fetchColumn() == 0){
                    $username = $_POST['username2'];
                    $clave = $_POST['password2'];
                    $email = $_POST['email'];
                    $insert = $connect -> prepare("INSERT INTO usuarios ( usuario, clave, email) values('$username', '$clave', '$email')");
                    $insert -> execute(array());
            }
            $query2 = $connect -> prepare("SELECT * FROM usuarios");
            $query2 -> execute(array());
            foreach($query2->fetchAll(PDO::FETCH_ASSOC) as $row2){
                if (($_POST['username2'] == $row2['usuario']) || ($_POST['email'] == $row2['email'])){//si el usuario o el correo ya están registrados no se puede registrar
                    //echo "error, ya estás registrado";//no insertar registros y enseñar mensaje de error
                }
                if (($_POST['username2'] != $row2['usuario']) || ($_POST['email'] != $row2['email'])){
                    $username2 = $_POST['username2'];
                    $clave2 = $_POST['password2'];
                    $email2 = $_POST['email'];
                    $insert2 = $connect -> prepare("INSERT INTO usuarios ( usuario, clave, email) values('$username2', '$clave2', '$email2')");
                    $insert2-> execute(array());
                }
                
        }
        }
    }
    
    $connect = null;//cerramos conexión
?>