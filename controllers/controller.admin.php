<?php
    require("models/model.users.php");
    require("models/model.posts.php");
    require("models/model.comment.php");
    require("models/model.likes.php");
      
    $modelUsers = new Users();
    $modelPosts = new Posts();
    $modelComments = new Comments();
    $modelLikes = new Likes();
        
       
    

    $users = $modelUsers->getAllUsers();
    
    if(empty($users)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    $NumberOfUsers = $modelUsers->countUsers();


    $NumberOfPosts = $modelPosts->countPosts();

   

    $NumberOfComments = $modelComments->countComments();

   

    $NumberOfLikes = $modelLikes->countLikes();

    

    $title= "Admin Page - Virtual Friends";

    require("views/admin/admin.php");

?>