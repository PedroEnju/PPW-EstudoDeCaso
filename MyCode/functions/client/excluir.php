<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $idCliente     = isset($_POST["id"])   ? trim($_POST["id"])    : FALSE;

    if(empty($idCliente)) {
        $return["status"] = 0;
        $return["error"] = "ID do Cliente não pode ser em branco!";
    } else {

        $results = $conn->query("update cliente set status = 'I' where id_cliente = " . $idCliente);

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Não foi possível!";
        }

    }

    echo json_encode($return);