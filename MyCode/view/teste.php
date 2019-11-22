<?php 

include_once __DIR__ . "/../functions/shared/xml.php";
include_once __DIR__ . "/../library/Xml.php";
include_once __DIR__ . "/../functions/state/estado.php";
$estados = getAll();

// EXPORTAR
// $xml = new Xml('estado', $estados, array('nome_estado', 'uf'));
// $manipulator = new XMLManipulator($xml);
// $manipulator->export();

// IMPORTAR
$xml2 = new Xml('estado', null, array('nome_estado', 'uf'));
$manipulator = new XMLManipulator($xml2);
$manipulator->import();