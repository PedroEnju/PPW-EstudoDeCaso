<?php

    function getAll($id = null, $conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";
        
        $byID = "";
        if(isset($id))
            $byID = " id_usuario = " . $id . ' and ';

        return $conn->query("select * from usuario where " . $byID . "status = 'A' order by nome_usuario asc"); 
    }

    function getAllFK($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";
        
        $byID = "";
        if(isset($id))
            $byID = " u.id_usuario = " . $id . ' and ';

        return $conn->query("select * from usuario u inner join cliente c on c.id_cliente = u.id_cliente and " . $byID . "c.status = 'A' and u.status = 'A' order by u.nome_usuario asc"); 
    }