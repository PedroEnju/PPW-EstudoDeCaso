<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $id             = isset($_POST["id"])           ? trim($_POST["id"])            : NULL;
    $nomeEstado     = isset($_POST["nomeEstado"])   ? trim($_POST["nomeEstado"])    : NULL;
    $uf             = isset($_POST["uf"])           ? trim($_POST["uf"])            : NULL;

    if(empty($id)) {
        $return["status"] = 0;
        $return["error"] = "ID do Estado não pode ser em branco!";
    } else if(empty($nomeEstado)) {
        $return["status"] = 0;
        $return["error"] = "Nome do Estado não pode ser em branco!";
    } else if(!preg_match(getVerify("estado"), $nomeEstado)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome do Estado!";
    } else if(empty($uf)) {
        $return["status"] = 0;
        $return["error"] = "UF não pode ser em branco!";
    } else {
        
        $results = $conn->query("update estado set nome_estado = '" . $nomeEstado . "', uf = '" . $uf . "' where id_estado = " . $id);

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!";
        }

    }

    echo json_encode($return);