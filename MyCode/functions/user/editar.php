<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $id             = isset($_POST["id"])           ? trim($_POST["id"])            : NULL;
    $nomeUsuario    = isset($_POST["nomeUsuario"])  ? trim($_POST["nomeUsuario"])   : NULL;
    $tipoUsuario    = isset($_POST["tipoUsuario"])  ? trim($_POST["tipoUsuario"])   : NULL;

    if(empty($id)) {
        $return["status"] = 0;
        $return["error"] = "ID da Usuário não pode ser em branco!";
    } else if(empty($nomeUsuario)) {
        $return["status"] = 0;
        $return["error"] = "Nome do Usuário não pode ser em branco!";
    } else if(!preg_match(getVerify("usuario"), $nomeUsuario)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome do Usuário!";
    } else if(empty($tipoUsuario)) {
        $return["status"] = 0;
        $return["error"] = "Tipo de Usuário não pode ser em branco!";
    } else {
        
        $results = $conn->query("update usuario set nome_usuario = '" . $nomeUsuario . "', tipoUsuario = '" . $tipoUsuario . "' where id_usuario = " . $id);

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!";
        }

    }

    echo json_encode($return);