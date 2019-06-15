<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $id             = isset($_POST["id"])           ? trim($_POST["id"])            : NULL;
    $nomeCidade     = isset($_POST["nomeCidade"])   ? trim($_POST["nomeCidade"])    : NULL;
    $cep            = isset($_POST["cep"])          ? trim($_POST["cep"])           : NULL;

    if(empty($id)) {
        $return["status"] = 0;
        $return["error"] = "ID da Cidade não pode ser em branco!";
    } else if(empty($nomeCidade)) {
        $return["status"] = 0;
        $return["error"] = "Nome da Cidade não pode ser em branco!";
    } else if(!preg_match(getVerify("cidade"), $nomeCidade)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome da Cidade!";
    } else if(empty($cep)) {
        $return["status"] = 0;
        $return["error"] = "CeP não pode ser em branco!";
    } else {
        
        $results = $conn->query("update cidade set nome_cidade = '" . $nomeCidade . "', cep = '" . $cep . "' where id_cidade = " . $id);

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!";
        }

    }

    echo json_encode($return);