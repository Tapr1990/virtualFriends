<?php

    require("models/model.about.php");
    require("models/model.users.php");
       
    $modelAbout = new About();
    $modelUsers = new Users();

    if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }

    $results = $modelAbout->getAbout($_SESSION["user_id"]);

   

    
    

    if(is_numeric($_SESSION["user_id"])){
        
        $user_id = $_SESSION["user_id"];
        
    }
    
    if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }
    
    $user = $modelUsers->getUser($user_id);
    
    if(empty($user)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }
    
    
    $profile_image = "";
    
    if($user["profile_image"] == "") {
        
        $profile_image = "images/person-placeholder.jpg";
    }
    else {
        $profile_image = $user["profile_image"];
    }
    
    
    $cover_image = "";
    
    if($user["cover_image"] == "") {
        
        $cover_image = "images/placeholder_2.jpg";
    }
    else {
        $cover_image = $user["cover_image"];
    }
    
    
  
    
    
    
   
    
    
    
    
    require("views/view.about.php");
    
?>