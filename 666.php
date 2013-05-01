<?php
setlocale(LC_TIME, "es_CL.utf8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('America/Santiago');

/** Include PHPExcel_IOFactory */
require_once 'assets/classes/PHPExcel/IOFactory.php';

$objReader = PHPExcel_IOFactory::createReader("Excel2007");
$objReader->setReadDataOnly(true);

$region = (isset($_GET['r'])) ? $_GET['r'] : '';
$n_region = '';

switch ($region) {
	case 1:
		$file = "assets/docs/1  Región_de_Tarapaca_1º_2013 v1.xlsx";
		$n_region = "de Tarapacá";
		break;
	case 2:
		$file = "assets/docs/2 Región_de_Antofagasta_1º_2013 v1.xlsx";
		$n_region = "de Antofagasta";
		break;
	case 3:
		$file = "assets/docs/3_Region_de_Atacama_1_2013_v2_180313.xlsx";
		$n_region = "de Atacama";
		break;
	case 4:
		$file = "assets/docs/4 Región_de_Coquimbo__1º_2013 v1.xlsx";
		$n_region = "de Coquimbo";
		break;
	case 5:
		$file = "assets/docs/5 Región_de_Valparaiso_1º_2013 v4_080213.xlsx";
		$n_region = "de Valparaíso";
		break;
	case 6:
		$file = "assets/docs/6 Región_de_O'Higgins__1º_2013 v1.xlsx";
		$n_region = "del Libertador Gral. Bernardo O’Higgins";
		break;
	case 7:
		$file = "assets/docs/7 Región_del_Maule_1º_2013_v2_090113.xlsx";
		$n_region = "del Maule";
		break;
	case 8:
		$file = "assets/docs/8_Region_de_Bio_Bio_1_2013_v2_210213.xlsx";
		$n_region = "del Biobío";
		break;
	case 9:
		$file = "assets/docs/9 Región_de_Araucanía_1º_2013_v2 110113.xlsx";
		$n_region = "de la Araucanía";
		break;
	case 10:
		$file = "assets/docs/10 Región_de_Los_Lagos_1_2013_v3 060213.xlsx";
		$n_region = "de Los Lagos";
		break;
	case 11:
		$file = "assets/docs/11 Región_del_Gral_del_Campo_1°_2013 v1.xlsx";
		$n_region = "de Aysén del Gral. Carlos Ibáñez del Campo";
		break;
	case 12:
		$file = "assets/docs/12 Región_de_Magallanes_y_Antartica_Chilena_1º_2013_v1.xlsx";
		$n_region = "de Magallanes y de la Antártica Chilena";
		break;
	case 14:
		$file = "assets/docs/14 Región_de_Los_Ríos__1º_2013_v1.xlsx";
		$n_region = "de Los Ríos";
		break;
	case 15:
		$file = "assets/docs/15  Región_de_Arica_y_Parinacota_1º_2013 v1.xlsx";
		$n_region = "Arica y Parinacota";
		break;
	
	default:
		$file = "assets/docs/13 Región_Metropolitana_1º_2013_v1.xlsx";
		$n_region = "Metropolitana de Santiago";
		break;
}
$objPHPExcel = $objReader->load($file);

$aData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$cnt = 1;
$hoy = $maniana = '';
foreach($aData as $registro) {
	//partimos desde la segunda fila de la hoja de calculo
	if($cnt>1) {
		//verifico que el registro sea igual a la fecha actual
		if( (strtotime('2013-'.$registro['F'].'-'.$registro['E'])) == strtotime( date('Y-m-d') ) ) {
			$hoy .= '<tr>';
			$hoy .= '<td><a href="https://maps.google.com/?q='.urlencode(strtolower($registro['D']).', '.strtolower($registro['B']).', chile').'" target="_blank">'.$registro['D'].'</a></td><td>'.$registro['B'].'</td>';
			$hoy .= '<td>'.strftime('%A %d de %B, %Y', strtotime('2013-'.$registro['F'].'-'.$registro['E'])) .'</td>';
			$hoy .= '<td>'.strtolower($registro['G']).'</td>';
			$hoy .= '</tr>';
		}
	}

	$cnt++;
}