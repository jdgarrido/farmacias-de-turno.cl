<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Farmacias de Turno</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="farmasias, Farmasias de turno, farmacias turno, Farmacia, farmacia, turno, turnos, farmacias antofagasta, farmacias santiago, farmacias temuco, farmacias biobio, farmacias rancagua">
		<meta name="description" content="Farmacias de Turno en Chile para las distintas regiones del país">
		<meta name="author" content="José Damián Garrido Muñoz (@jgarrido)">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

	</head>

	<body>
		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<?php
				if(!isset($_GET['r'])) {
				?>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php
				}
				?>
				<a class="navbar-brand" href="/">Farmacias de turno</a>
			</div>

			<?php
			if(!isset($_GET['r'])) {
			?>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#arica_y_parinacota">Arica y Parinacota</a></li>
					<li><a href="#tarapaca">Tarapacá</a></li>
					<li><a href="#antofagasta">Antofagasta</a></li>
					<li><a href="#atacama">Atacama</a></li>
					<li><a href="#coquimbo">Coquimbo</a></li>
					<li><a href="#valparaiso">Valparaíso</a></li>
					<li><a href="#metropolitana">Metropolitana</a></li>
					<li><a href="#ohiggins">O'Higgins</a></li>
					<li><a href="#maule">Maule</a></li>
					<li><a href="#biobio">Bio-Bio</a></li>
					<li><a href="#araucania">Araucania</a></li>
					<li><a href="#los_rios">los Ríos</a></li>
					<li><a href="#los_lagos">los Lagos</a></li>
					<li><a href="#aysen">Aysen</a></li>
					<li><a href="#magallanes">Magallanes</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
			<?php
			}
			?>
		</nav>

		<div class="container">
			<div class="row">
				<div class="alert alert-info col-sm-3 col-sm-offset-9">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Hey!!!</strong>
					Estamos con una nueva versión y me gustaría obtener <a href="https://docs.google.com/forms/d/1HoKg74V_RLUEhBrZweD-dHcHZqHTDKb0SsyFykkKy8E/viewform" target="_blank">comentarios <i class="glyphicon glyphicon-envelope"></i></a>
				</div>
			</div>
			<div class="row">
				
				<?php
				$filter_region = (isset($_GET['r'])) ? '&r='.$_GET['r'] : '';
				$aListadoFarmacias = json_decode( file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/777.php?type=json'.$filter_region) );

				foreach( $aListadoFarmacias as $key => $farmacia ) {
					?>
					<div class="col-xs-12">
						<div class="page-header">
					      <h2 id="<?php echo $key ?>"><?php echo $farmacia[0]->region ?></h2>
					    </div>
					    <div class="table-responsive">
						    <table class="table table-striped">
						    	<tr>
						    		<th>Comuna</th>
						    		<th>Dirección</th>
						    		<th>Farmacia</th>
						    	</tr>
						    <?php
						    foreach( $farmacia as $f ) {
						    	?>
						    	<tr>
						    		<td><?php echo $f->comuna ?></td>
						    		<td><a href="http://maps.google.com?q=<?php echo urlencode($f->direccion.', '.$f->comuna) ?>" target="_blank"><?php echo $f->direccion ?></a></td>
						    		<td><?php echo $f->farmacia ?></td>
						    	</tr>
						    	<?php
						    }
						    ?>
						    </table>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<?php include_once("ganalytics.php") ?>
	</body>
</html>