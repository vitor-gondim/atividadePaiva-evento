<?php

require_once 'init.php';

$busca = $_GET['busca'] ?? '';
$todasAreas = 'Todas as áreas';
$areaFiltro = $_GET['area'] ?? $todasAreas;
$dataFiltro = $_GET['data'] ?? '';

$areas = [];
$eventos = [];

foreach ($_SESSION['eventos'] as $evento) {

    $areas[$evento['area']] = $evento['area'];

    $passa = true;


    if ($busca != '' && !is_int(stripos($evento['titulo'], $busca))) {
        $passa = false;
    }

    if ($areaFiltro != $todasAreas && $evento['area'] != $areaFiltro) {
        $passa = false;
    }

    if ($dataFiltro != '' && $evento['data'] != $dataFiltro) {
        $passa = false;
    }

    if ($passa) {
        $eventos[$evento['id']] = $evento;
    }
}

?>