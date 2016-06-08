<?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $dbName = "meit";

    $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database

    
    //FORMULARIO PARA LOGUEARTE CON UN USUARIO YA EXISTENTE
    if (isset($_POST['btnLogin'])){//si se pulsa el botón de login..
    	if ((isset($_POST['username'])) && (isset($_POST['password']))){//si tanto el nombre de usuario como la contraseña están introducidos...
            $query = $connect -> prepare("SELECT * FROM usuarios");//preparamos la consulta para sacar la info de la base..
            $query -> execute(array());//ejecutamos dicha consulta..
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row){//por cada fila sacamos los resultados
                if (($_POST['username'] == $row['usuario']) && ($_POST['password'] == $row['clave'])){//para ahora compararlos..
                    //si el usuario y la contraseña introducidos coinciden con los de la base de datos entonces aparece la pestaña "mi perfil"
                }//cerrar if
            }//cerrar foreach
        }//cerrar if
    }//cerrar if   
    elseif (isset($_POST['btnLogin'])){
        if ((!isset($_POST['username'])) || (!isset($_POST['password']))){
            echo "rellenar los campos";//si no se ha rellenado ni usuario ni contraseña que salga mensaje informativo
        }
    }

    
    //FORMULARIO PARA REGISTRARTE COMO UN NUEVO USUARIO
    if (isset($_POST['btnRegister'])){
        if ((isset($_POST['username2'])) && (isset($_POST['email'])) && (isset($_POST['password2']))){
            $query = $connect -> prepare("SELECT * FROM usuarios");
            $query -> execute(array());
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row){
                if (($_POST['username2'] == $row['usuario']) || ($_POST['email'] == $row['email'])){//si el usuario o el correo ya est�n registrados no se puede registrar
                    echo "error, ya est�s registrado";//no insertar registros y ense�ar mensaje de error
                }
                elseif (($_POST['username2'] != $row['usuario']) || ($_POST['email'] != $row['email'])){
                    $username = $_POST['username2'];
                    $clave = $_POST['password2'];
                    $email = $_POST['email'];
                    echo "caca";
                    $insert = $connect -> prepare("INSERT INTO usuarios ( usuario, clave, email) values('$username', '$clave', '$email')");
                    $insert -> execute(array());
                }
            }
        }
    }
    
    $connect = null;//cerramos conexi�n
?>