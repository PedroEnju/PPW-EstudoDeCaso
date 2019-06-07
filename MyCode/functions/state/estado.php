<?php

    function getAll($id = null, $conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        $byID = "";
        if(isset($id))
        	$byID = " id_estado = " . $id . ' and ';

        return $conn->query("select * from estado where " . $byID . "status = 'A' order by nome_estado asc"); 
    }