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
	case "tarapaca":
		$file = "assets/docs/1 Region_de_Tarapaca_2_2013_v2 250613_ver_001.xlsx";
		$n_region = "de Tarapacá";
		break;
	case 2:
	case "antofagasta":
		$file = "assets/docs/2 Region_de_Antofagasta_2_2013_v1 0713.xlsx";
		$n_region = "de Antofagasta";
		break;
	case 3:
	case "atacama":
		$file = "assets/docs/3 Region_de_Atacama_2_2013_v1 0713.xlsx";
		$n_region = "de Atacama";
		break;
	case 4:
	case "coquimbo":
		$file = "assets/docs/4 Region_de_Coquimbo_2_2013_v1 0713.xlsx";
		$n_region = "de Coquimbo";
		break;
	case 5:
	case "valparaiso":
		$file = "assets/docs/5_Region_de_Valparaiso_2_2013.xlsx";
		$n_region = "de Valparaíso";
		break;
	case 6:
	case "ohiggins":
		$file = "assets/docs/6_Region_de_O'Higgins_2_2013_v2_010713.xlsx";
		$n_region = "del Libertador Gral. Bernardo O’Higgins";
		break;
	case 7:
	case "maule":
		$file = "assets/docs/7 Región_del_Maule_2_2013_v1_0713.xlsx";
		$n_region = "del Maule";
		break;
	case 8:
	case "biobio":
		$file = "assets/docs/8 Region_de_Bio Bio_2_2013_v2 010713.xlsx";
		$n_region = "del Biobío";
		break;
	case 9:
	case "araucania":
		$file = "assets/docs/9 Region_de_Araucania_2_2013_v2 010713.xlsx";
		$n_region = "de la Araucanía";
		break;
	case 10:
	case "los_lagos":
		$file = "assets/docs/Region_de_Los_Lagos_2_2013_v2 010713_ver_001.xlsx";
		$n_region = "de Los Lagos";
		break;
	case 11:
	case "aysen":
		$file = "assets/docs/11 Region_de_Aysen_2_2013_v1 0713.xlsx";
		$n_region = "de Aysén del Gral. Carlos Ibáñez del Campo";
		break;
	case 12:
	case "magallanes_antartica":
		$file = "assets/docs/12 Region_de_Magallanes_2_2013_v1 0713.xlsx";
		$n_region = "de Magallanes y de la Antártica Chilena";
		break;
	case 14:
	case "de_los_rios":
		$file = "assets/docs/14 Region_de_Los Rios_2_2013_v1 0713.xlsx";
		$n_region = "de Los Ríos";
		break;
	case 15:
	case "arica_parinacota":
		$file = "assets/docs/15_Region_de_Arica_y_Parinacota_2_2013_v1 0713.xlsx";
		$n_region = "Arica y Parinacota";
		break;
	default:
		$file = "assets/docs/13 Region_Metropolitana_2_2013_v2 040713.xlsx";
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
			$hoy .= '<td>'.$registro['C'].'</td>';
			$hoy .= '<td><a href="https://maps.google.com/?q='.urlencode(strtolower($registro['D']).', '.strtolower($registro['B']).', chile').'" target="_blank">'.$registro['D'].'</a></td><td>'.$registro['B'].'</td>';
			$hoy .= '<td>'.strftime('%A %d de %B, %Y', strtotime('2013-'.$registro['F'].'-'.$registro['E'])) .'</td>';
			$hoy .= '</tr>';
		}
	}

	$cnt++;
}