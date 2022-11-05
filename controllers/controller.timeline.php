<?php

    require("models/model.users.php");
    require("models/model.posts.php");
    require("models/model.likes.php");
   

   
    $modelUsers = new Users();
    $modelPosts = new Posts();
    $modelLikes = new Likes();

    $user_id = $_SESSION["user_id"];

    

 

    $posts = $modelPosts->getAllPosts();

    if(empty($posts)) {
        http_response_code(404);
        require("views/view.error_400.php");
    }

    if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }   

    $user = $modelUsers->getUser($user_id);

    if(empty($user)) {
        http_response_code(404);
        require("views/view.error_400.php");
    }

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
            http_response_code(200);

        }else {
            $message= "Error! Bad Request";
            http_response_code(400);
        }    
    }else {
        $message= "Error! Method Not Alowed";
        http_response_code(405);
    }



    

    $title = "VirtualFriends";

    require("views/view.timeline.php");
?>