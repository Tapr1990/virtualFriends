<?php

    require("models/model.users.php");

    if(is_numeric($_SESSION["user_id"])){

        $user_id = $_SESSION["user_id"];

    }
 
  
    $modelUsers = new Users();

    $user = $modelUsers->getUser($user_id);

    $imageFriends= "";

   
    if($user["gender"] == "M") {

        $imageFriends = "views/images/placeholder_men.jpg";

    } 
    else {

        $imageFriends = "views/images/placeholder_women.jpg";
    }


    

    $friends = $modelUsers->getFriends($user_id);

  

    $title= "Virtual Friends";

    require("views/view.friends.php");

?>