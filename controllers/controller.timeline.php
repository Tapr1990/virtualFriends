<?php

    require("models/model.users.php");


    $modelUsers = new Users();

    $user = $modelUsers->getUser($_SESSION["user_id"]);


    $title = "VirtualFriends";

    require("views/view.timeline.php");
?>