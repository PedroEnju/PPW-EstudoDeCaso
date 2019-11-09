<?php

    class Xml
    {
        private $table;
        private $values;
        private $cols;

        public function __construct($table, $values, $cols) 
        {
            $this->table = $table;
            $this->values = $values;
            $this->cols = $cols;
        }

        public function setTable($table)
        {
            $this->table = $table;
        }

        public function getTable()
        {
            return $this->table;
        }

        public function setValues($values)
        {
            $this->values = $values;
        }

        public function getValues()
        {
            return $this->values;
        }

        public function setCols($cols)
        {
            $this->cols = $cols;
        }

        public function getCols()
        {
            return $this->cols;
        }
    }
