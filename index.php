
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Farmacias de Turno - CL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="farmasias, Farmasias de turno, farmacias turno, Farmacia, farmacia, turno, turnos, <?php echo date('Y') ?>, <?php echo date('F') ?>,region,Arica,Parinacota,Tarapacá,Antofagasta,Atacama,Coquimbo,Valparaíso,Metropolitana,Santiago,Libertador Gral. Bernardo OHiggins,Maule,Biobío,Araucanía,de Los Ríos,de Los Lagos,de Aysén,de Magallanes">
    <meta name="description" content="Listado Farmacias de Turno en Chile para las distintas regiones del país">
    <meta name="author" content="José Damián Garrido Muñoz (jgarrido)">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 70px;
        padding-bottom: 40px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="assets/ico/favicon.png" />
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/"><h1>Farmacias de Turno</h1></a>
          <div class="nav-collapse collapse">

            <ul class="nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Regiones <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/?r=15">Arica y Parinacota</a></li>
                  <li><a href="/?r=1">Tarapacá</a></li>
                  <li><a href="/?r=2">Antofagasta</a></li>
                  <li><a href="/?r=3">Atacama</a></li>
                  <li><a href="/?r=4">Coquimbo</a></li>
                  <li><a href="/?r=5">Valparaíso</a></li>
                  <li><a href="/?r=13">Metropolitana de Santiago</a></li>
                  <li><a href="/?r=6">Del Libertador Gral. Bernardo O’Higgins</a></li>
                  <li><a href="/?r=7">Del Maule</a></li>
                  <li><a href="/?r=8">Del Biobío</a></li>
                  <li><a href="/?r=9">De la Araucanía</a></li>
                  <li><a href="/?r=14">De los Ríos</a></li>
                  <li><a href="/?r=10">De los Lagos</a></li>
                  <li><a href="/?r=11">Aysén del Gral. Carlos Ibáñez del Campo</a></li>
                  <li><a href="/?r=12">Magallanes y de la Antártica Chilena</a></li>
                </ul>
              </li>
              <li><a href="#acerca">Acerca</a></li>
              <li><a href="/sitemap.php">Mapa del sitio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Example row of columns -->
      <div class="row-fluid">
        <?php
        include('666.php');
        ?>
        <h2>Farmacias de turno en la región <?php echo $n_region ?></h2>
        <h3><?php echo strftime("%A %d de %B, %G", strtotime(date('Y-m-d'))) ?></h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Dirección</th>
              <th>Comuna</th>
              <th>Fecha</th>
              <th>Horario atención</th>
            </tr>
          </thead>
          <tbody>
            <?php
            echo $hoy;
            ?>
          </tbody>
        </table>
        <div id="acerca">
          <h3>Acerca</h3>
          <p>Los datos que aquí se presentan fueron obtenidos desde el <a href="http://datos.gob.cl/datasets/ver/1547">Portal de Datos Públicos del Estado</a> con fecha 10 de Abril del 2013 y se entregan tal como vienen.</p>
          <h3>Fork me</h3>
          <p><a href="https://github.com/jdgarrido/farmacias-de-turno.cl">Deseas mejorar esto? :)</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <?php include_once("ganalytics.php") ?>
  </body>
</html>
