<?php

    include "../../include/functions.php";

    session_start();

    unset($_SESSION["idUsuario"]);

    header("location: " . URL . "MyCode/view/login.php");