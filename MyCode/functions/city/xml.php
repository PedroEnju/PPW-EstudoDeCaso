<?php

    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 'EXPORT';

    if($tipo == 'EXPORT') {
        include_once "cidade.php";
        $cidades = getAllFK();

        $xml = '<body>';

        if(isset($cidades) && !empty($cidades)) :
            foreach ($cidades as $cidade) :
                $xml .= '<item>';
                $xml .= '<estado>' . ucwords(strtolower($cidade["nome_estado"])) . '</estado>';
                $xml .= '<cidade>' . ucwords(strtolower($cidade["nome_cidade"])) . '</cidade>';
                $xml .= '<cep>' . $cidade["cep"] . '</cep>';
                $xml .= '</item>';
            endforeach;
        endif;

        $xml .= '</body>';

        $archive = fopen(__DIR__ . '/../../xml/cidades.xml', 'w+');
        fwrite($archive, $xml);
        fclose($archive);
    } else if($tipo = 'IMPORT') {
        $xml = simplexml_load_file(__DIR__ . '/../../xml/cidades.xml');
        $body = '<div class="text-light">';
        foreach ($xml as $cidade) :
            $body .= 'Estado: <b>' . $cidade->estado . '</b> ';
            $body .= 'Cidade: ' . $cidade->cidade;
            if($cidade->cep != '') {
                $body .= ' - ' . $cidade->cep;
            }
            $body .= '<br><hr>';
        endforeach;
        $body .= '</div>';

        echo json_encode($body);
    }
