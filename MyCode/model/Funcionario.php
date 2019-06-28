<?php

class Funcionario {

    private $idFuncionario;
    private $nomeFuncionario;
    private $matricula;
    private $rg;
    private $departamento;

    public function __construct($nomeFuncionario, $matricula, $rg, $departamento) {
        $this->nomeFuncionario  = $nomeFuncionario;
        $this->matricula        = $matricula;
        $this->rg               = $rg;
        $this->departamento     = $departamento;
    } 

    public function getID() {
        return $this->idFuncionario;
    }

    public function setID($id) {
        $this->idFuncionario = $id;
    }

    public function getNome() {
        return $this->nomeFuncionario;
    }

    public function setNome($nome) {
        $this->nomeFuncionario = $nome;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getRG() {
        return $this->rg;
    }

    public function setRG($rg) {
        $this->rg = $rg;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

}