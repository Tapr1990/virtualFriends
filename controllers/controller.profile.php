<?php
    
   require("models/model.users.php");
   require("models/model.posts.php");
   require("models/model.comment.php");
    
   
   $modelComments = new Comments();
   $modelUsers = new Users();
   $modelPosts = new Posts();
   
   
   $URI = urldecode($_SERVER['REQUEST_URI']);
   $url = explode ("/", $URI);

   

   if(!empty($url[2]) && $url[2] != $_SESSION["user_id"]) {

       $user_id = $url[2];

       $user = $modelUsers->getUser($user_id); 

       $posts = $modelPosts->getPosts($user_id);

       $friends = $modelUsers->getFriends($user_id);


       $profile_image = "";
    
       if($user["profile_image"] == "") {
   
           $profile_image = "images/placeholder_men.jpg";
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
   
   
                                   
       $imageFriends= "";
   
      
       if($user["gender"] == "M") {
   
           $imageFriends = "images/placeholder_men.jpg";
   
       } 
       else {
   
           $imageFriends = "images/placeholder_women.jpg";
       }
   

       
   }
   else {

       if(is_numeric($_SESSION["user_id"])){
    
             $user_id = $_SESSION["user_id"];
    
        }
      
        $user = $modelUsers->getUser($user_id);
       
    
    
    
       
        //* Criar Posts

        if(isset($_POST["send"])) {
           
            //var_dump($_FILES);
            //print_r($_POST);
    
                if(
                    //!empty($_FILES["file"]["name"]) ||
                    !empty($_POST["post"]) &&
                    is_numeric($_SESSION["user_id"]) &&
                    mb_strlen($_POST["post"]) >= 10 &&
                    mb_strlen($_POST["post"]) <= 200 
                    
                  
                ) { 
    
                    
                    $user = $_SESSION["user_id"];
    
                    $post_id = $modelPosts->createPost($user, $_POST);
                    //print_r($result);
    
                    header("Location: /profile");
                }
                else {
                    $message = "";
                }
        }
    
        $posts = $modelPosts->getPosts($user_id);
       
        
    
    
        //* editar posts

        if(isset($_POST["edit"])) {
           
          
                if(
                   
                    !empty($_POST["update"]) &&
                    !empty($_POST["postid"]) &&
                    is_numeric($_POST["postid"]) &&
                    mb_strlen($_POST["update"]) >= 1 &&
                    mb_strlen($_POST["update"]) <= 200 
            
                  
                    
                  
                ) { 
                   
                    $post = $_POST["update"];
                    $postid = $_POST["postid"];
                   
                    
                    //$user = $_SESSION["user_id"];
    
                    $update = $modelPosts->editPost($post, $postid);
                    //print_r($result);
    
                    header("Location: /profile");
                }
                else {
                    $message = "";
                }
        }
       
    
    
        //* eliminar posts


        

        


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
                    $message = "";
                }
        }
       
    
    
        
    
    
    
    
    
        //* comentários
  
    
            if(isset($_POST["sendcomment"])) {
    
                //var_dump($_POST);
    
                if(
                
                    !empty($_POST["comment"]) &&
                    !empty($_POST["postid"]) &&
                    is_numeric($_POST["postid"]) &&
                    mb_strlen($_POST["comment"]) >= 8 &&
                    mb_strlen($_POST["comment"]) <= 65535 
                
                ) {
    
                    
    
            
    
                    $user_id = $_SESSION["user_id"];
                    
                    $post_id = $_POST["postid"];
                    
                    $comment = $_POST["comment"];
    
                    $result = $modelComments->createComment($post_id, $user_id, $comment);
                    //var_dump($result);
    
                    header("Location: /profile");
                }    
                
            }
            
            //$comments = $modelComments->getComments($user_id);
    
    
            
                    
        //* likes
        if(isset($_POST["sendlike"]) && isset($_POST["postid"])) {
    
            //var_dump($_POST);
    
            if(
                !empty($_POST["postid"]) &&
                is_numeric($_POST["postid"])
                
            ) {   
             
                
            
                //$user_id = $_SESSION["user_id"];
    
                
                $result = $modelPosts->likePost($_POST); //$user_id);
    
           
    
                header("Location: /profile");
            }    
    
    
        }
       
        
                   
      
        
    
    
    
       
        //* imagens
    
        $profile_image = "";
    
        if($user["profile_image"] == "") {
    
            $profile_image = "images/placeholder_men.jpg";
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
    
    
                                    
        $imageFriends= "";
    
       
        if($user["gender"] == "M") {
    
            $imageFriends = "images/placeholder_men.jpg";
    
        } 
        else {
    
            $imageFriends = "images/placeholder_women.jpg";
        }
    
    
        
    
        $friends = $modelUsers->getFriends($user_id);
    
    
        if(isset($_POST["sendlike"])) {
    
            require("models/model.likes.php");
    
            $model = new Posts();
    
            //$post = $model->($_POST["postid"]);
    
           
    
        }
   }




    
   

    $title = "VirtualFriends";

    require("views/view.profile.php");
?>