<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $nomeEstado     = isset($_POST["nomeEstado"])   ? trim($_POST["nomeEstado"])    : FALSE;
    $uf             = isset($_POST["uf"])           ? trim($_POST["uf"])            : FALSE;

    if(empty($nomeEstado)) {
        $return["status"] = 0;
        $return["error"] = "Nome do Estado não pode ser em branco!";
    } else if(!preg_match(getVerify("estado"), $nomeEstado)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome do Estado!";
    } else if(empty($uf)) {
        $return["status"] = 0;
        $return["error"] = "UF não pode ser em branco!";
    } else {

        $results = $conn->query("insert into estado (nome_estado, uf, status) values ('" . $nomeEstado . "', '" . $uf . "', 'A')");

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!";
        }

    }

    echo json_encode($return);