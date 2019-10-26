<?php

class DatabaseProperties {
    
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;
    
    public function __construct() {
        $this->host = "localhost";
        $this->port = "3306";
        $this->dbname = "ProjetoPPW";
        $this->user = "root";
        $this->pass = "enju";
    }
    
    function getHost() {
        return $this->host;
    }
    
    function getPort() {
        return $this->port;
    }

    function getDbname() {
        return $this->dbname;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }
    
}

