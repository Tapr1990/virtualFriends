<?php

    require("models/model.users.php");
    require("models/model.posts.php");
    require("models/model.likes.php");
    require("models/model.comment.php");
   

   
    $modelUsers = new Users();
    $modelPosts = new Posts();
    $modelLikes = new Likes();
    $modelComments = new Comments();

    $user_id = $_SESSION["user_id"];

    if(isset($_POST["send"])) {
              
        
    
        if(
            
            !empty($_POST["post"]) &&
            
            mb_strlen($_POST["post"]) >= 1 &&
            mb_strlen($_POST["post"]) <= 200 
            
          
        ) { 

            
           

            $post_id = $modelPosts->createPost($user_id, $_POST);
            //print_r($result);

            header("Location: /timeline");
            
        }
        else {
            $message = "Error! Fill the fields correctly";
            http_response_code(400);
        }
    }

    
    

 

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

    
    //* likes

    if(isset($_POST["like"])) {
    
        //var_dump($_POST);

        if(
            !empty($_POST["postid"]) &&
            is_numeric($_POST["postid"])
            
        ) {   
         
            
        
        
            $post_id = $_POST["postid"];
            
         
            $result = $modelLikes->insertLikes($post_id, $user_id);
            
            header("Location: /timeline");
          

        }else {
            $message= "Error! Bad Request";
            http_response_code(400);
        }    
    }


    //* create comments
    if(isset($_POST["sendcomment"])) {
    
        //var_dump($_POST);

        if(
        
            !empty($_POST["comment"]) &&
            !empty($_POST["postid"]) &&
            is_numeric($_POST["postid"]) &&
            mb_strlen($_POST["comment"]) >= 1 &&
            mb_strlen($_POST["comment"]) <= 65535 
        
        ) {

            

    

          
            
            $postid = $_POST["postid"];
            
            $comment = $_POST["comment"];

           

            header("Location: /timeline");
          
        }    
        else {
            $message = "Error! Fill the fields correctly";
            http_response_code(400);
        }
    }


     //* remove posts


     if(isset($_POST["delete"])) {
           
           
        if(
           
           
            !empty($_POST["postid"]) &&
            is_numeric($_POST["postid"]) 
          
        ) { 
    
            $postid = $_POST["postid"];
            $update = $modelPosts->deletePost($postid);
           
            
            

           

            header("Location: /profile");
            
            
        }
        else {
            $message = "Error! Not found";
            http_response_code(400);
        }
}


    
   


  

    
    $profile_image = "";
    
    if($user["profile_image"] == "") {

        $profile_image = "images/person-placeholder.jpg";
        
    }
    else {
        $profile_image = $user["profile_image"];
        
    }


    

    $title = "VirtualFriends";

    require("views/view.timeline.php");
?>