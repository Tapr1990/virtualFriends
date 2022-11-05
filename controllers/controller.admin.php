<?php
    require("models/model.users.php");
    require("models/model.posts.php");
    require("models/model.comment.php");
      
    $modelUsers = new Users();
    $modelPosts = new Posts();
    $modelComments = new Comments();
        
       
    

    $users = $modelUsers->getAllUsers();
    
    if(empty($users)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    $NumberOfUsers = $modelUsers->countUsers();

    if(empty($NumberOfUsers)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    

    $NumberOfPosts = $modelPosts->countPosts();

    if(empty($NumberOfPosts)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    $NumberOfComments = $modelComments->countComments();

    if(empty($NumberOfComments)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    $title= "Admin Page - Virtual Friends";

    require("views/admin/admin.php");

?>