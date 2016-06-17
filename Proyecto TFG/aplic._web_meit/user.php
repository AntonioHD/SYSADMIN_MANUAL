<!DOCTYPE html>
<?php 
header('Content-Type: text/html; charset=ISO-8859-1'); 
    include 'indexphp.php'; 
    
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $dbName = "meit";

    session_start();
    $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database
    //GUARDAR INFO CLIENTES
    if (isset($_POST['guardar'])){
        $query = $connect -> prepare("SELECT * FROM usuarios");
        $query -> execute (array());
        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row){
            if (($_SESSION['username']) == ($row['usuario'])){ //COMO HACER PARA QUE SE COMPARE CON EL USUARIO QUE SE HA LOGUEADO
                $query2 = $connect -> prepare("SELET count(nombreusuario) FROM clientes");
                $query2 -> execute();
                if ($query2->fetchColumn() > 0){
                    $update = $connect -> prepare("UPDATE clientes SET nombre=".$nombre.", apellido1=".$apellido1.", apellido2=".$apellido2.", telefono=".$telefono.", prvincia=".$provincia.", localidad=".$localidad.", cod_postal=".$cod_postal.", direccion=".$direccion."WHERE nombreusuario=".$row['usuario']);
                    $update -> execute(array());
                }
                else{
                $nombreusuario = $row['usuario'];
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $telefono = $_POST['telefono'];
                $provincia = $_POST['provincia'];
                $localidad = $_POST['localidad'];
                $cod_postal = $_POST['cod_postal'];
                $direccion = $_POST['direccion'];
                $insert = $connect -> prepare("INSERT INTO clientes (nombreusuario, nombre, apellido1, apellido2, telefono, provincia, localidad, cod_postal, direccion) values ('$nombreusuario', '$nombre', '$apellido1', '$apellido2', '$telefono', '$provincia', '$localidad', '$cod_postal', '$direccion')");
                $insert -> execute(array());
                }
            }
            
        }
    }
    
    $connect = null;
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Meit - User Profile</title>

<link href="css-user/bootstrap.min.css" rel="stylesheet">
<link href="css-user/datepicker3.css" rel="stylesheet">
<link href="css-user/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js-user/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>MEIT</span>USUARIO</a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li class="active"><a href="user.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Perfil</a></li>
			<li><a href="productosservicios.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Mis productos y servicios</a></li>
			<li><a href="proveedores.php"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>  Mis proveedores</a></li>
			<li><a href="contratar.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Contratar</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="index.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Salir </a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Perfil</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			
                        <div class="container">
                              <div class="row">
                              <!-- left column -->
                              <div class="col-md-3">
                                <div class="text-center">
                                  <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                                  <h6>Selecciona una foto...</h6>

                                  <input class="form-control" type="file">
                                </div>
                              </div>

                              <!-- edit form column -->
                              <div class="col-md-9 personal-info">
                                <h3>Información personal</h3>

                                <form class="form-horizontal" role="form" method='post' action=<?php echo $_SERVER['PHP_SELF']?>>
                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Nombre:</label>
                                    <div class="col-lg-8">
                                      <input class="form-control" type="text" name="nombre" >
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Primer Apellido:</label>
                                    <div class="col-lg-8">
                                      <input class="form-control" type="text" name="apellido1">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Segundo Apellido:</label>
                                    <div class="col-lg-8">
                                      <input class="form-control" type="text" name="apellido2">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Teléfono:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="telefono">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Provincia:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" type="text" name='provincia'>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Localidad:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" type="text" name='localidad'>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Codigo postal:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="cod_postal">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Direccion:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" type="text" name='direccion'>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                      <input class="btn btn-primary" value="Guardar Cambios" type="submit" name='guardar'>
                                      <span></span>
                                    </div>
                                  </div>
                                </form>
                              </div>
                          </div>
                        </div>
                        <hr>
			
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js-user/jquery-1.11.1.min.js"></script>
	<script src="js-user/bootstrap.min.js"></script>
	<script src="js-user/chart.min.js"></script>
	<script src="js-user/chart-data.js"></script>
	<script src="js-user/easypiechart.js"></script>
	<script src="js-user/easypiechart-data.js"></script>
	<script src="js-user/bootstrap-datepicker.js"></script>
</body>

</html>
