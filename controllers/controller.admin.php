<?php
    require("models/model.users.php");
    require("models/model.posts.php");
    require("models/model.comment.php");
      
    $modelUsers = new Users();
    $modelPosts = new Posts();
    $modelComments = new Comments();
        
       
    //$posts = $modelPosts->adminPosts();

    $users = $modelUsers->getAllUsers();
    //print_r($dates);
    //print_r($users);

    $NumberOfUsers = $modelUsers->countUsers();

    //print_r($users[0] ["COUNT(*)"]);

    $NumberOfPosts = $modelPosts->countPosts();

    $NumberOfComments = $modelComments->countComments();

    $title= "Admin Page - Virtual Friends";

    require("views/admin/admin.php");

?>