<?php
// header('Content-Type: text/html; charset=UTF-8');
setlocale(LC_ALL, "es_CL.utf8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('America/Santiago');


function lasFarmacias( $filter = array() ) {
    $pais = array (
        1 => array (
             'region' => 'tarapaca',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/1_Region_de_Tarapaca.csv"
            ),
        2 => array (
            'region' => 'antofagasta',
            'comuna' => 'Concon',
             'archivo' => "assets/csv/2_Region_de_Antofagasta.csv"
            ),
        3 => array (
             'region' => 'atacama',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/3_Region_de_Atacama.csv"
            ),
        4 => array (
            'region' => 'coquimbo',
            'comuna' => 'Concon',
             'archivo' => "assets/csv/4_Region_de_Coquimbo.csv"
            ),
        5 => array (
             'region' => 'valparaiso',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/5_Region_de_Valparaiso.csv"
            ),
        6 => array (
             'region' => 'ohiggins',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/6_Region_de_OHiggins.csv"
            ),
        7 => array (
            'region' => 'maule',
            'comuna' => 'Concon',
             'archivo' => "assets/csv/7_Region_del_Maule.csv"
            ),
        8 => array (
             'region' => 'biobio',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/8_Region_de_Bio_Bio.csv"
            ),
        9 => array (
            'region' => 'araucania',
            'comuna' => 'Concon',
             'archivo' => "assets/csv/9_Region_de_Araucania.csv"
            ),
        10 => array (
             'region' => 'los_lagos',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/10_Region_de_Los_Lagos.csv"
            ),
        11 => array (
             'region' => 'aysen',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/11_Region_de_Aysen.csv"
            ),
        12 => array (
            'region' => 'magallanes',
            'comuna' => 'Concon',
             'archivo' => "assets/csv/12_Region_de_Magallanes.csv"
            ),
        13 => array (
             'region' => 'metropolitana',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/13_Region_Metropolitana.csv"
            ),
        14 => array (
            'region' => 'los_rios',
            'comuna' => 'Concon',
             'archivo' => "assets/csv/14_Region_de_Los_Rios.csv"
            ),
        15 => array (
             'region' => 'arica_y_parinacota',
             'comuna' => 'Concon',
             'archivo' => "assets/csv/15_Region_de_Arica_y_Parinacota.csv"
            )
    );

    $aFarmacias = array();
    
    foreach ($pais as $p) {
        $fila = 0;
        $file = $p['archivo'];
        $region = $p['region'];
        $comuna = $p['comuna'];

        if( ( $region == $filter['region'] OR $comuna == $filter['comuna'] ) OR $filter['region'] == 'all') {
            if (($gestor = fopen($file, "r")) !== FALSE) {
                while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
                    if(date('Y-n-j')==date('Y-'.$datos[5].'-'.$datos[4])) {
                        $aFarmacias[$region][$fila]['region'] = $datos[0];
                        $aFarmacias[$region][$fila]['comuna'] = mb_convert_case($datos[1], MB_CASE_TITLE, 'UTF-8');
                        $aFarmacias[$region][$fila]['farmacia'] = mb_convert_case($datos[2], MB_CASE_TITLE, 'UTF-8');//$datos[2];
                        $aFarmacias[$region][$fila]['direccion'] = mb_convert_case($datos[3], MB_CASE_TITLE, 'UTF-8');//$datos[3];
                        $aFarmacias[$region][$fila]['dia'] = $datos[4];
                        $aFarmacias[$region][$fila]['mes'] = $datos[5];

                        $fila++;
                    }
                    
                }
                fclose($gestor);
            }
        }
    }

    return $aFarmacias;
}

$type = 'json';
$region = (isset($_GET['r'])) ? htmlentities($_GET['r']) : 'all';
$comuna = (isset($_GET['c'])) ? htmlentities($_GET['c']) : 'all';

if( $type == htmlentities($_GET['type'])) {
    header('Content-Type: application/json; charset=utf-8');
    switch($region) {
        case 'de_los_rios':
            $region = 'los_rios';
            break;
        case 'de_los_lagos':
            $region = 'los_lagos';
            break;
        case 'magallanes_antartica':
            $region = 'magallanes';
            break;
    }

    $aFarmacias = lasFarmacias( array( 'region' => $region, 'comuna' => $comuna ) );
    echo json_encode($aFarmacias);
}