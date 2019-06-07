<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $idUsuario     = isset($_POST["id"])   ? trim($_POST["id"])    : FALSE;

    if(empty($idUsuario)) {
        $return["status"] = 0;
        $return["error"] = "ID do Usuário não pode ser em branco!";
    } else if($_SESSION["idUsuario"] == $idUsuario) {
        $return["status"] = 0;
        $return["error"] = "Não pode ser deletado a sua própria conta!";
    } else {

        $results = $conn->query("update usuario set status = 'I' where id_usuario = " . $idUsuario);

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Não foi possível!";
        }

    }

    echo json_encode($return);