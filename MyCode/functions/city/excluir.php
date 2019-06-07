<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $idCidade     = isset($_POST["id"])   ? trim($_POST["id"])    : FALSE;

    if(empty($idCidade)) {
        $return["status"] = 0;
        $return["error"] = "ID da Cidade não pode ser em branco!";
    } else {

        $results = $conn->query("update cidade set status = 'I' where id_cidade = " . $idCidade);

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Não foi possível!";
        }

    }

    echo json_encode($return);