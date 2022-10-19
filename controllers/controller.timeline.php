<?php

    require("models/model.users.php");
    require("models/model.posts.php");
    //require("models/model.posts.php");

    //$modelPosts = new Posts();
    $modelUsers = new Users();
    $modelPosts = new Posts();

    $user_id = $_SESSION["user_id"];

    

    //$posts = $modelPosts->getPosts($user_id);

    //$posts = $modelPosts->getAllPosts($user_id);

    $posts = $modelPosts->getAllPosts();

    $user = $modelUsers->getUser($user_id);

    


    /*$user_id = $_SESSION["user_id"];

    //$posts = $modelPosts->getPosts($user_id);
    $user = $modelUsers->getUser($user_id);
    $followers = $modelUsers->getUsers($user_id);
    
    $followers_ids = false;
    if(is_array($followers)) {
        
        $followers_ids = array_column($followers, "user_id");
        $followers_ids = implode("','", $followers_ids);
    }
    
    if($followers_ids){
        
        $posts = $modelPosts->getAllPosts($user_id, $followers_ids);
    }*/


    $title = "VirtualFriends";

    require("views/view.timeline.php");
?>