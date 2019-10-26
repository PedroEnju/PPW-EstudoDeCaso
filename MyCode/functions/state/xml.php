<?php

    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 'EXPORT';

    if($tipo == 'EXPORT') {
        include_once "estado.php";
        $estados = getAll();

        $xml = '<body>';

        if(isset($estados) && !empty($estados)) :
            foreach ($estados as $estado) :
                $xml .= '<item>';
                $xml .= '<name>' . ucwords(strtolower($estado["nome_estado"])) . '</name>';
                $xml .= '<uf>' . strtoupper($estado['uf']) . '</uf>';
                $xml .= '</item>';
            endforeach;
        endif;

        $xml .= '</body>';

        $archive = fopen(__DIR__ . '/../../xml/estados.xml', 'w+');
        fwrite($archive, $xml);
        fclose($archive);
    } else if($tipo = 'IMPORT') {
        $xml = simplexml_load_file(__DIR__ . '/../../xml/estados.xml');
        $body = '<div class="text-light">';
        foreach ($xml as $estado) :
            $body .= $estado->name;
            if($estado->uf != '') {
                $body .= ' - ' . $estado->uf;
            }
            $body .= '<br><hr>';
        endforeach;
        $body .= '</div>';

        echo json_encode($body);
    }
