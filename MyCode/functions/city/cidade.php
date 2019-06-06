<?php

    function getAll($conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once "../services/conexao.php";

        return $conn->query("select * from cidade where status = 'A' order by nome_cidade asc"); 
    }