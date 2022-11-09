<?php


    $URI = urldecode($_SERVER['REQUEST_URI']);
    $url = explode ("/", $URI);

    $postid = $url[2];


     if(isset($_POST["edit2"])) {
        
       
             if(
                
                 !empty($_POST["update"]) &&
                 
                
                 mb_strlen($_POST["update"]) >= 1 &&
                 mb_strlen($_POST["update"]) <= 200 
         
               
                 
               
             ) { 

                require("models/model.posts.php");
                $modelPosts = new Posts();
                
                 $post = $_POST["update"];
                 
                
                 
                
 
                 $update = $modelPosts->editPost($post, $postid);
                 
 
                 
                
                
             }
             else {
                 $message = "Error! Fill the fields correctly";
                 http_response_code(400);
             }
     }

     require("views/admin/admin_edit_posts.php");

?>