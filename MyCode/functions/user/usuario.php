<?php

    function getAll($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        return $conn->query("select * from usuario where status = 'A' order by nome_usuario asc"); 
    }

    function getAllFK($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        return $conn->query("select * from usuario u inner join cliente c on c.id_cliente = u.id_cliente and c.status = 'A' and u.status = 'A' order by u.nome_usuario asc"); 
    }