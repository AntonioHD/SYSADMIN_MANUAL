<!DOCTYPE html>
<?php 
header('Content-Type: text/html; charset=ISO-8859-1'); 

    include 'indexphp.php';
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
				<h1 class="page-header">Mis Servicios y Pagos</h1>
			</div>
		</div><!--/.row-->
				
			
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Servicios</div>
					<div class="panel-body">
						<table data-toggle="table" class="table">
						    <thead>
						    <tr>
                                                        <th data-field="revocar">Revocar</th>
						        <th data-field="codigo" data-align="right">Codigo</th>
						        <th data-field="nombre">Nombre</th>
						        <th data-field="precio">Precio</th>
                                                        <th data-field="cod_prov">Codigo Proveedor</th>
						    </tr>
						    </thead>
                                                    <tbody>
                                                        <?php
                                                        $host = "localhost";
                                                        $user = "root";
                                                        $pwd = "root";
                                                        $dbName = "meit";

                                                        session_start();
                                                        $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database
                                                        $sqlQuery = "select * from servicios where usuario=".$_SESSION['username'];
                                                        $query = $connect->prepare($sqlQuery);
                                                        $query->execute(array());

                                                        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row1){//get all the rows from database and input them into tableif
                                                        ?>

                                                        <tr id="rows">
                                                            <td><input type="checkbox" name="showHide[]" value="<?php echo $row1['codigo'];?>"/></td>
                                                            <td><?php echo $row1['codigo'];?></td>
                                                            <td><?php echo $row1['nombre'];?></td>
                                                            <td><?php echo $row1['precio'];?></td>
                                                            <td><?php echo $row1['codigoproveedor'];?></td>
                                                        </tr>
                                                        <?php
                                                        }//close foreach
                                                        ?>
                                                    </tbody>
						</table>
                                                <button type="submit" id="btnLogin" name="contratar" class="btn btn-default btn-md">Revocar Seleccionados</button>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Pagos</div>
					<div class="panel-body">
						<table data-toggle="table" class="table">
						    <thead>
						    <tr>
						        <th data-field="numero" data-align="right">Número de Pago</th>
						        <th data-field="cantidad">Cantidad</th>
						        <th data-field="fechacontrato">Fecha Contrato</th>
                                                        <th data-field="fechavencimiento">Fecha Vencimiento</th>
						    </tr>
						    </thead>
                                                    <tbody>
                                                        <?php
                                                        $host = "localhost";
                                                        $user = "root";
                                                        $pwd = "root";
                                                        $dbName = "meit";

                                                        $connect = new PDO("mysql:host=".$host.";dbname=".$dbName.";",$user,$pwd);//connection to the database
                                                        $sqlQuery2 = "select * from pagos where usuario=".$_SESSION['username'];
                                                        $query2 = $connect->prepare($sqlQuery2);
                                                        $query2->execute(array());

                                                        foreach($query2->fetchAll(PDO::FETCH_ASSOC) as $row2){//get all the rows from database and input them into tableif
                                                        ?>

                                                        <tr id="rows">
                                                            <td><?php echo $row2['num_pago'];?></td>
                                                            <td><?php echo $row2['cantidad'];?></td>
                                                            <td><?php echo $row2['fecha_contrato'];?></td>
                                                            <td><?php echo $row2['fecha_vencimiento'];?></td>
                                                        </tr>
                                                        <?php
                                                        }//close foreach
                                                        ?>
                                                    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
        </div>
                
	<script src="js-user/jquery-1.11.1.min.js"></script>
	<script src="js-user/bootstrap.min.js"></script>
	<script src="js-user/chart.min.js"></script>
	<script src="js-user/chart-data.js"></script>
	<script src="js-user/easypiechart.js"></script>
	<script src="js-user/easypiechart-data.js"></script>
	<script src="js-user/bootstrap-datepicker.js"></script>
</body>

</html>
