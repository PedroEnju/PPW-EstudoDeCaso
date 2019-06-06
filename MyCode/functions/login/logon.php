<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $usuario    = isset($_POST["usuario"])  ? trim($_POST["usuario"])   : FALSE;
    $senha      = isset($_POST["senha"])    ? trim($_POST["senha"])     : FALSE;

    if(empty($usuario)) {
        $return["status"] = 0;
        $return["error"] = "Usuário não pode ser em branco!";
    } else if(!preg_match(getVerify("usuario"), $usuario)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no Campo Usuário!";
    } else if(empty($senha)) {
        $return["status"] = 0;
        $return["error"] = "Senha não pode ser em branco!";
    } else {

        $results = $conn->query("select id_usuario, tipo_usuario from usuario where nome_usuario = '" . $usuario . "' and senha_usuario = '" . md5($senha) . "'");

        if($result = $results->fetch(PDO::FETCH_BOTH)) :
            $_SESSION["idUsuario"]      = $result["id_usuario"];
            $_SESSION["tipoUsuario"]    = $result["tipo_usuario"];
        else:
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!";
        endif;

    }

    echo json_encode($return);