<!DOCTYPE html>
<?php 
header('Content-Type: text/html; charset=ISO-8859-1'); 

    include 'indexphp.php';
    
    /*if (isset($_POST['contratar'])){
        if(!empty($_POST['contratar'])) {
            foreach($_POST['contratar'] as $check){
                $sth = $connect -> prepare("INSERT INTO servicios ( nombre, precio, codigoproveedor, usuario) values('$nombre', '$clave', '$email')");
                $sth -> execute(array());
            }
        }
        if(!empty($_POST['contrata2'])) {
            foreach($_POST['contratar2'] as $check){
                $sth = $connect -> prepare("UPDATE guest SET status = 1 WHERE ID =".$check);
                $sth -> execute(array());
            }
        }
        if(!empty($_POST['contratar3'])) {
            foreach($_POST['contratar3'] as $check){
                $sth = $connect -> prepare("UPDATE guest SET status = 1 WHERE ID =".$check);
                $sth -> execute(array());
            }
        }
    }*/
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
                    <h1 class="page-header">Contratar</h1>
                </div>
            </div><!--/.row-->
                
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                                    <form class="form-horizontal" role="form" method='post' action=<?php echo $_SERVER['PHP_SELF']?>>
					<div class="panel-heading">Contratar nuevos servicios</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
						    <thead>
						    <tr>
						        <th data-field="contratar" data-checkbox="true" >Contratar</th>
						        <th data-field="nombre"  data-sortable="true">Nombre</th>
						        <th data-field="precio" data-sortable="true">Precio (€)</th>
                                                        <th data-field="codigoproveedor" data-sortable="true">Codigo Proveedor</th>
						    </tr>
						    </thead>
                                                    <tbody>
                                                        <?php
                                                        $host = "localhost";
                                                        $user = "root";
                                                        $pwd = "root";
                                                        $dbName = "meit";

                                                        $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database

                                                        ?>

                                                        <tr id="rows">
                                                            <td><input type="checkbox" name="contratar"/></td>
                                                            <td>Optimización de Equipos</td>
                                                            <td>25</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr id="rows">
                                                            <td><input type="checkbox" name="contratar2"/></td>
                                                            <td>Diseño Web</td>
                                                            <td>80</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr id="rows">
                                                            <td><input type="checkbox" name="contratar3"/></td>
                                                            <td>Estudio e Implantación de Redes</td>
                                                            <td>200</td>
                                                            <td>3</td>
                                                        </tr>
                                                    </tbody>
						</table>
                                            <button type="submit" id="contratar" name="contratar" class="btn btn-default btn-md">Contratar seleccionados</button>
					</div>
                                    </form>
				</div>
			</div>
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
