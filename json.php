<?php
// header('Content-Type: text/html; charset=UTF-8');
setlocale(LC_ALL, "es_CL.utf8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('America/Santiago');

define('JUNAR_URL', 'http://api.recursos.datos.gob.cl/datastreams/invoke/FARMA-DE-TURNO-EN-LINEA?auth_key=');
define('AUTH_KEY', '');
define('OUTPUT', 'json_array');

$type = 'json';
if( $type == htmlentities($_GET['type'])) {
  header('Content-Type: application/json; charset=utf-8');
}

$data = file_get_contents(JUNAR_URL.AUTH_KEY.'&output='.OUTPUT.'&filter0=column0[==]7');
echo $data;