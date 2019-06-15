<?php

    function getAll($id = null, $conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";
        
        $byID = "";
        if(isset($id))
            $byID = " id_cidade = " . $id . ' and ';

        return $conn->query("select * from cidade where " . $byID . "status = 'A' order by nome_cidade asc"); 
    }

    function getAllFK($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        $byID = "";
        if(isset($id))
            $byID = " c.id_cidade = " . $id . ' and ';

        return $conn->query("select * from cidade c inner join estado e on e.id_estado = c.id_estado and " . $byID . "c.status = 'A' and e.status = 'A' order by c.nome_cidade asc"); 
    }