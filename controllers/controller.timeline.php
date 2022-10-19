<?php

    require("models/model.users.php");
    require("models/model.posts.php");
   

   
    $modelUsers = new Users();
    $modelPosts = new Posts();

    $user_id = $_SESSION["user_id"];

    

 

    $posts = $modelPosts->getAllPosts();

    $user = $modelUsers->getUser($user_id);

    

    $title = "VirtualFriends";

    require("views/view.timeline.php");
?>