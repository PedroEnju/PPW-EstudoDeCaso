<?php

session_start();

define("URL", "http://localhost/PPW/EstudoDeCaso/");
define("BASE_URL", $_SERVER["DOCUMENT_ROOT"] . "/PPW/EstudoDeCaso/");

if(file_exists(URL. "MyCode/library/MyException.php")) {
    require_once URL . '/MyCode/library/MyException.php';
}

function getVerify($name) {
    
    if(empty($name)) {
        throw new MyException("Nome de verificação não informado!");
    }
    
    $string = "/^[a-zA-Z áéíóúãÕÁÉÍÓÚÃÕçÇàèìòùÀÈÌÒÙ]*$/";

    $verify = array(
        "usuario" => "/^[a-zA-Z0-9\. ]*$/",
        "cliente" => $string,
        "funcionario" => $string,
        "estado" => $string,
        "cidade" => $string,
        "dtNascimento" => "/^[0-3]{1}[0-9]{1}[\/]{1}[0-1]{1}[0-9]{1}[\/]{1}[0-9]{4}/",
    );

    return isset($verify[$name]) ? $verify[$name] : FALSE;
}
