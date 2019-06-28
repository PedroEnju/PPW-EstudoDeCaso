<?php

    include_once "../../include/functions.php";
    include_once "../../services/conexao.php";
    include_once "../../model/Funcionario.php";

    $return = array();
    $return["status"] = 1;

    $nomeFuncionario    = isset($_POST["nomeFuncionario"])  ? trim($_POST["nomeFuncionario"])   : FALSE;
    $matricula          = isset($_POST["matricula"])        ? trim($_POST["matricula"])         : FALSE;
    $rg                 = isset($_POST["rg"])               ? trim($_POST["rg"])                : FALSE;
    $departamento       = isset($_POST["departamento"])     ? trim($_POST["departamento"])      : FALSE;

    if(empty($nomeFuncionario)) {
        $return["status"] = 0;
        $return["error"] = "Nome do Funcionário não pode ser em branco!";
    } else if(!preg_match(getVerify("funcionario"), $nomeFuncionario)) {
        $return["status"] = 0;
        $return["error"] = "Não é permitido caractéres especiais no campo Nome do Funcionário!";
    } else if(empty($matricula)) {
        $return["status"] = 0;
        $return["error"] = "Matrícula não pode ser em branco!";
    } else if(empty($rg)) {
        $return["status"] = 0;
        $return["error"] = "RG não pode ser em branco!";
    } else if(empty($departamento)) {
        $return["status"] = 0;
        $return["error"] = "Departamento não pode ser em branco!";
    } else {

        $f = new Funcionario($nomeFuncionario, $matricula, $rg, $departamento);

        $return["response"] = "Nome do Funcionário: " . $f->getNome() . "\r\nMatrícula: " . $f->getMatricula() . "\r\nRG: " . $f->getRG() . "\r\nDepartamento: " . $f->getDepartamento();

    }

    echo json_encode($return);
    die;

