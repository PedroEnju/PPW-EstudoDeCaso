<?php

    include "../../include/functions.php";
    include "../../services/conexao.php";

    $return = array();
    $return["status"] = 1;

    $idCidade       = isset($_POST["idCidade"])     ? trim($_POST["idCidade"])      : FALSE;
    $nomeCliente    = isset($_POST["nomeCliente"])  ? trim($_POST["nomeCliente"])   : FALSE;
    $cpf            = isset($_POST["cpf"])          ? trim($_POST["cpf"])           : FALSE;
    $dtNascimento   = isset($_POST["dtNascimento"]) ? trim($_POST["dtNascimento"])  : FALSE;
    $sexo           = isset($_POST["sexo"])         ? trim($_POST["sexo"])          : FALSE;
    $estadoCivil    = isset($_POST["estadoCivil"])  ? trim($_POST["estadoCivil"])   : FALSE;
    $email          = isset($_POST["email"])        ? trim($_POST["email"])         : FALSE;

    if(empty($idCidade)) {
        $return["status"] = 0;
        $return["error"] = "Cidade não pode ser em branco!";
    } else if(empty($nomeCliente)) {
        $return["status"] = 0;
        $return["error"] = "Nome do Cliente não pode ser em branco!";
    } else if(!preg_match(getVerify("cliente"), $nomeCliente)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome do Cliente!";
    } else if(empty($cpf)) {
        $return["status"] = 0;
        $return["error"] = "CPF não pode ser em branco!";
    } else if(strlen($cpf) != 14) {
        $return["status"] = 0;
        $return["error"] = "CPF está incorreto!";
    } else if(!validaCPF($cpf)) {
        $return["status"] = 0;
        $return["error"] = "CPF está incorreto!";
    } else if(empty($dtNascimento)) {
        $return["status"] = 0;
        $return["error"] = "Data de Nascimento não pode ser em branco!";
    } else if(!preg_match(getVerify("dtNascimento"), $dtNascimento)) {
        $return["status"] = 0;
        $return["error"] = "Data de Nascimento está incorreto!";
    } else if(empty($sexo)) {
        $return["status"] = 0;
        $return["error"] = "Sexo não pode ser em branco!";
    } else if(empty($estadoCivil)) {
        $return["status"] = 0;
        $return["error"] = "Estado Civil não pode ser em branco!";
    } else if(empty($email)) {
        $return["status"] = 0;
        $return["error"] = "Email não pode ser em branco!";
    } else {

        $results = $conn->query("insert into cliente (id_cidade, nome_cliente, cpf, data_nascimento, sexo, estado_civil, email, status) values (" . $idCidade . ", '" . $nomeCidade . "', '" . $cpf . "', " . $dtNascimento . ", " . $sexo . ", " . $estadoCivil . ", " . $email . ", 'A')");

        //TODO update usuario with id cliente

        if(!$results) {
            $return["status"] = 0;
            $return["error"] = "Dados incorretos!";
        }

    }

    echo json_encode($return);
    die;

    function validaCPF($cpf)
    {
        $cpf = str_replace(".", "", str_replace("-", "", $cpf));
        if(strlen($cpf) != 11) return false;

        $soma = 0;
     
        for ($i = 0; $i < 9; $i++)  {
            $soma += (10 - $i) * $cpf[$i];
        }

        $digitoVerificador = 11 - ($soma % 11);
     
        if(($soma % 11) < 2) {
            $digitoVerificador = 0;
        }

        if($cpf[9] != $digitoVerificador) return false;

        $soma = 0;
     
        for ($i = 0; $i < 9; $i++)  {
            $soma += (11 - $i) * $cpf[$i];
        }
        
        $soma += 2 * $cpf[9];

        $digitoVerificador = 11 - ($soma % 11);
       
        if(($soma % 11) < 2) $digitoVerificador = 0;
        if($cpf[10] != $digitoVerificador) return false;

        return true;
    }
