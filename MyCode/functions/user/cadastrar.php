<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $nomeUsuario    = isset($_POST["nomeUsuario"])  ? trim($_POST["nomeUsuario"])   : FALSE;
    $senha          = isset($_POST["senha"])        ? trim($_POST["senha"])         : FALSE;
    $senhaConf      = isset($_POST["senhaConf"])    ? trim($_POST["senhaConf"])     : FALSE;

    if(empty($nomeUsuario)) {
        $return["status"] = 0;
        $return["error"] = "Nome do Usuário não pode ser em branco!";
    } else if(!preg_match(getVerify("usuario"), $nomeUsuario)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome do Usuário!";
    } else if(empty($senha) || empty($senhaConf)) {
        $return["status"] = 0;
        $return["error"] = "Senha/Confirmação de Senha não pode ser em branco!";
    } else if($senha !== $senhaConf) {
        $return["status"] = 0;
        $return["error"] = "Confirmação de Senha está incorreta!";
    } else {

        $pass = md5($senha);

        $results = $conn->query("insert into usuario (tipo_usuario, nome_usuario, senha_usuario, status) values ('C', '" . $nomeUsuario . "', '" . $pass . "', 'A')");

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!" ;
        }

    }

    echo json_encode($return);
