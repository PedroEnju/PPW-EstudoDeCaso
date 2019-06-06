<?php
	
	session_start();

    define("URL", "http://localhost/PPW/EstudoDeCaso/");

    function getVerify($name)
    {
    	$string = "/^[a-zA-Z áéíóúãÕÁÉÍÓÚÃÕçÇàèìòùÀÈÌÒÙ]*$/";
    	
    	$verify = array(
    		"usuario"	=> "/^[a-zA-Z0-9\. ]*$/",
            "cliente"   => $string,
    		"estado" 	=> $string,
            "cidade"    => $string,
            "dtNascimento"  => "/^[0-3]{1}[0-9]{1}[\/]{1}[0-1]{1}[0-9]{1}[\/]{1}[0-9]{4}/",
		);

    	return isset($verify[$name]) ? $verify[$name] : FALSE;
    }
