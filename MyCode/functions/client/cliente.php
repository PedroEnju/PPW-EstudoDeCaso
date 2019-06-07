<?php

    function getAll($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        return $conn->query("select * from cliente where status = 'A' order by nome_cliente asc"); 
    }

    function getAllFK($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        return $conn->query("select * from cliente c inner join cidade ci on ci.id_cidade = c.id_cidade and c.status = 'A' and ci.status = 'A' order by c.nome_cliente asc"); 
    }