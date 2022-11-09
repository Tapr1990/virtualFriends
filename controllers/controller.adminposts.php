<?php

    require("models/model.posts.php");

    $model = new Posts();

    $posts = $model->adminPosts();


    

    if(isset($_POST["delete"])) {
            
            
        if(
            !empty($_POST["postid"]) &&
            is_numeric($_POST["postid"]) 
        ) { 
        
            $postid = $_POST["postid"];
        
            $result = $model->deletePost($postid);
        
            header("Location: /adminposts");
        }
        else {
            $message = "Error!";
            http_response_code(400);
        }
    }

    

    $title= "Admin Page - Virtual Friends";

    require("views/admin/adminposts.php");

?>