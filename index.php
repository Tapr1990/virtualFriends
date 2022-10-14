<?php

    session_start();

    $url_parts = explode("/", $_SERVER["REQUEST_URI"]);

    //echo "<pre>";//</pre>
    //print_r($url_parts);


    $controller = $url_parts[1] ?: "home";//if abreviado para o empty

    $id2Page = $url_parts[2] ?? "";
    

    require("controllers/controller." .$controller. ".php");
?>