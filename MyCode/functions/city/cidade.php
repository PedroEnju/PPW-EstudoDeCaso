<?php

    function getAll($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        return $conn->query("select * from cidade where status = 'A' order by nome_cidade asc"); 
    }

    function getAllFK($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        return $conn->query("select * from cidade c inner join estado e on e.id_estado = c.id_estado and c.status = 'A' and e.status = 'A' order by c.nome_cidade asc"); 
    }