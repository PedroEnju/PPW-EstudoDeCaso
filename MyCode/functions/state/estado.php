<?php

    function getAll($id = null, $conn = null)
    {
        if(!isset($conn) && is_null($conn))
            include_once __DIR__ . "/../../services/conexao.php";

        $byID = "";
        if(isset($id))
            $byID = " id_estado = " . $id . ' and ';

        try {
            return $conn->query("select * from estado where " . $byID . "status = 'A' order by nome_estado asc");
        } catch (SqlException $e) {
            throw new SqlException($e->getMessage());
        }
    }