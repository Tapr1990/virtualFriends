<?php
    
   require("models/model.users.php");
   require("models/model.posts.php");
   require("models/model.comment.php");
   require("models/model.likes.php");
  
    
   
   $modelComments = new Comments();
   $modelUsers = new Users();
   $modelPosts = new Posts();
   $modelLikes = new Likes();
   
   
   
   $URI = urldecode($_SERVER['REQUEST_URI']);
   $url = explode ("/", $URI);
   
   
   

   if(!empty($url[2]) && $url[2] != $_SESSION["user_id"]) {

       $user_id = $url[2];

       if(empty($user_id) || !is_numeric($user_id)) {
            http_response_code(400);
            require("views/view.error_400.php");
            exit;
       }

       $user = $modelUsers->getUser($user_id); 

       if(empty($user)) {
            http_response_code(404);
            require("views/view.error_404.php");
            exit;
        }


        

       $posts = $modelPosts->getPosts($user_id);

       
       foreach($posts as $key => $post) {
           $posts[$key]["comments"] = $modelComments->getComments($post["post_id"], $user_id);
       }

       


       $friends = $modelUsers->getFriends($user_id);


       //* create comments

      
       if(isset($_POST["sendcomment"])) {
    
        var_dump($_POST);

        if(
        
            !empty($_POST["comment"]) &&
            !empty($_POST["postid"]) &&
            is_numeric($_POST["postid"]) &&
            mb_strlen($_POST["comment"]) >= 1 &&
            mb_strlen($_POST["comment"]) <= 65535 
        
        ) {

            

    

           
            
                $postid = $_POST["postid"];
                
                $comment = $_POST["comment"];

                $result = $modelComments->createComment($postid, $user_id, $comment);
                //var_dump($result);

                header("Location: /profile/" . $user_id);
          
            }    
            else {
                $message = "Error! Fill the fields correctly";
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
   
   
       $cover_image = "";
   
       if($user["cover_image"] == "") {
   
           $cover_image = "images/placeholder_2.jpg";
          
       }
       else {
           $cover_image = $user["cover_image"];
         
       }
   
   
                        

       
   }
   else {
        if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
            http_response_code(400);
            require("views/view.error_400.php");
            exit;
        }

      
           
        $userid = $_SESSION["user_id"];
      

        $user = $modelUsers->getUser($userid);

        if(empty($user)) {
            http_response_code(404);
            require("views/view.error_404.php");
            exit;
        }
      
        
    
    
    
       
        //* Create Posts

        if(isset($_POST["send"])) {
              
        
    
                if(
                    
                    !empty($_POST["post"]) &&
                    is_numeric($_SESSION["user_id"]) &&
                    mb_strlen($_POST["post"]) >= 1 &&
                    mb_strlen($_POST["post"]) <= 200 
                    
                  
                ) { 
    
                    
                    $userid = $_SESSION["user_id"];
    
                    $post_id = $modelPosts->createPost($userid, $_POST);
                    //print_r($result);
    
                    header("Location: /profile");
                   
                }
                else {
                    $message = "Error! Fill the fields correctly";
                    http_response_code(400);
                }
        }


        //* get posts
      
    
        $posts = $modelPosts->getPosts($userid);
       
   
        foreach($posts as $key => $post) {
            $posts[$key]["comments"] = $modelComments->getComments($post["post_id"], $userid);
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
       
    
    
        
    
    
    
    
    
        //* comments
  
    
            if(isset($_POST["sendcomment"])) {
    
                //var_dump($_POST);
    
                if(
                
                    !empty($_POST["comment"]) &&
                    !empty($_POST["postid"]) &&
                    is_numeric($_POST["postid"]) &&
                    mb_strlen($_POST["comment"]) >= 1 &&
                    mb_strlen($_POST["comment"]) <= 65535 
                
                ) {
    
                    
    
            
    
                    $userid = $_SESSION["user_id"];
                    
                    $postid = $_POST["postid"];
                    
                    $comment = $_POST["comment"];
    
                    $result = $modelComments->createComment($postid, $userid, $comment);
                    //var_dump($result);
    
                    header("Location: /profile");
                  
                }    
                else {
                    $message = "Error! Fill the fields correctly";
                    http_response_code(400);
                }
            }
            
          
    
    
            
                    
        //* likes
        if(isset($_POST["like"])) {
    
          
    
            if(
                !empty($_POST["postid"]) &&
                is_numeric($_POST["postid"])
                
            ) {   
             
                
            
                $userid = $_SESSION["user_id"];
                $postid = $_POST["postid"];
                
                
                $result = $modelLikes->insertLikes($postid, $userid);
           
    
                header("Location: /profile");
                
            }    
            else {
                $message = "Error! Not found";
                http_response_code(400);
            }
        }
        
        //* get friends
 
    
     
        $friends = $modelUsers->getFriends($userid);

        if(empty($friends)) {
            http_response_code(404);
            require("views/view.error_404.php");
            exit;
        }

        
 
        
        //* images
     
        $profile_image = "";
    
        if($user["profile_image"] == "") {
    
            $profile_image = "images/person-placeholder.jpg";
            
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
     
        
       
         
     
     
 
 
    }
     
 
    $title = "VirtualFriends";
 
    require("views/view.profile.php");
        
       
        
     
    
?>
    
        

 
        


        
        
        




    
   
