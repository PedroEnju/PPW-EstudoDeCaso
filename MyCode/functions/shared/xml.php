<?php

    class XMLManipulator
    {

        private $objeto;

        public function __construct($objeto)
        {
            $this->objeto = $objeto;
        }

        public function export()
        {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= '<body>';
            foreach ($this->objeto->getValues() as $item) :
                $xml .= '<item>';

                foreach ($this->objeto->getCols() as $col) :
                    $xml .= '<' . $col . '>' . $item[$col] . '</' . $col . '>';
                endforeach;

                $xml .= '</item>';
            endforeach;
            $xml .= '</body>';

            $archive = fopen(__DIR__ . '/../../xml/' . $this->objeto->getTable() . '.xml', 'w+');
            fwrite($archive, $xml);
            fclose($archive);
        }

        public function import()
        {
            $objeto = simplexml_load_file(__DIR__ . '/../../xml/' . $this->objeto->getTable() . '.xml');

            $body = '';
            foreach ($objeto as $key => $item) :
                foreach ($item as $key => $col) :
                    $body .= $col . ' ';
                endforeach;
                $body .= '<br>';
            endforeach;

            echo json_encode($body);
        }

    }
