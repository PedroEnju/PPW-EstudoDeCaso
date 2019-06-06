<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $idEstado       = isset($_POST["idEstado"])     ? trim($_POST["idEstado"])      : FALSE;
    $nomeCidade     = isset($_POST["nomeCidade"])   ? trim($_POST["nomeCidade"])    : FALSE;
    $cep            = isset($_POST["cep"])          ? trim($_POST["cep"])           : FALSE;

    if(empty($idEstado)) {
        $return["status"] = 0;
        $return["error"] = "Estado não pode ser em branco!";
    } else if(empty($nomeCidade)) {
        $return["status"] = 0;
        $return["error"] = "Nome da Cidade não pode ser em branco!";
    } else if(!preg_match(getVerify("cidade"), $nomeCidade)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome da Cidade!";
    } else if(empty($cep)) {
        $return["status"] = 0;
        $return["error"] = "CEP não pode ser em branco!";
    } else if(strlen($cep) != 9) {
        $return["status"] = 0;
        $return["error"] = "CEP está incorreto!";
    } else {

        $results = $conn->query("insert into cidade (id_estado, nome_cidade, cep, status) values (" . $idEstado . ", '" . $nomeCidade . "', '" . $cep . "', 'A')");

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!";
        }

    }

    echo json_encode($return);
