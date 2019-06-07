<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $idEstado     = isset($_POST["id"])   ? trim($_POST["id"])    : FALSE;

    if(empty($idEstado)) {
        $return["status"] = 0;
        $return["error"] = "ID do Estado não pode ser em branco!";
    } else {

        $results = $conn->query("update estado set status = 'I' where id_estado = " . $idEstado);

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Não foi possível!";
        }

    }

    echo json_encode($return);