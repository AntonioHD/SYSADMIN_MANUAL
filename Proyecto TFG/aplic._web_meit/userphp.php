<?php 
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $dbName = "meit";
    
    $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database
    
    if (isset($_POST['guardar'])){
        $query = $connect -> prepare("SELECT * FROM usuarios");
        $query -> execute (array());
        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row){
            if (($_GET['username'] == $row['usuario'])){ //COMO HACER PARA QUE SE COMPARE CON EL USUARIO QUE SE HA LOGUEADO
                echo "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $telefono = $_POST['telefono'];
                $provincia = $_POST['provincia'];
                $localidad = $_POST['localidad'];
                $cod_postal = $_POST['cod_postal'];
                $direccion = $_POST['direccion'];
                $insert = $connect -> prepare("INSERT INTO clientes (nombre, apellido1, apellido2, telefono, provincia, localidad, cod_postal, direccion) values ('', $nombre, $apellido1, $apellido2, $telefono, $provincia, $localidad, $cod_postal, $direccion)");
                $insert -> execute(array());
                
            }
        }
    }
?>