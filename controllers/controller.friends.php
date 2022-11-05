<?php

    require("models/model.users.php");

    if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }

    if(is_numeric($_SESSION["user_id"])){

        $user_id = $_SESSION["user_id"];

    }
 
  
    $modelUsers = new Users();



    $user = $modelUsers->getUser($user_id);

    if(empty($user)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }


    $imageFriends= "";

   
    if($user["gender"] == "M") {

        $imageFriends = "images/placeholder_men.jpg";

    } 
    else {

        $imageFriends = "images/placeholder_women.jpg";
    }


    if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }
    

    $friends = $modelUsers->getFriends($user_id);

    if(empty($friends)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }


    $profile_image = "";
    
        if($user["profile_image"] == "") {
    
            $profile_image = "images/placeholder_men.jpg";
            http_response_code(200);
        }
        else {
            $profile_image = $user["profile_image"];
            http_response_code(200);
        }
    
    
        $cover_image = "";
    
        if($user["cover_image"] == "") {
    
            $cover_image = "images/placeholder_2.jpg";
            http_response_code(200);
        }
        else {
            $cover_image = $user["cover_image"];
            http_response_code(200);
        }

  

    $title= "Virtual Friends";

    require("views/view.friends.php");

?>