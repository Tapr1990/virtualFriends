<?php

    require("models/model.users.php");
    require("models/model.posts.php");
    require("models/model.likes.php");
   

   
    $modelUsers = new Users();
    $modelPosts = new Posts();
    $modelLikes = new Likes();

    $user_id = $_SESSION["user_id"];

    

 

    $posts = $modelPosts->getAllPosts();

    $user = $modelUsers->getUser($user_id);

    if(isset($_POST["like"])) {
    
        //var_dump($_POST);

        if(
            !empty($_POST["postid"]) &&
            is_numeric($_POST["postid"])
            
        ) {   
         
            
        
            $user_id = $_SESSION["user_id"];
            $post_id = $_POST["postid"];
            
            //$result1 = $modelPosts->likes($_POST, $user_id);
            $result = $modelLikes->insertLikes($post_id, $user_id);
       

            header("Location: /timeline");
        }    


    }

    

    $title = "VirtualFriends";

    require("views/view.timeline.php");
?>