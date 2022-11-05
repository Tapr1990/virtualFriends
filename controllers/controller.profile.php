<?php
    
   require("models/model.users.php");
   require("models/model.posts.php");
   require("models/model.comment.php");
   require("models/model.likes.php");
   require("models/model.requests.php");
    
   
   $modelComments = new Comments();
   $modelUsers = new Users();
   $modelPosts = new Posts();
   $modelLikes = new Likes();
   $modelRequests = new Requests();
   
   
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

       if(empty($posts)) {
            http_response_code(404);
            require("views/view.error_404.php");
            exit;
        }

       $friends = $modelUsers->getFriends($user_id);

       if(empty($friends)) {
            http_response_code(404);
            require("views/view.error_404.php");
        exit;
        }



       $profile_image = "";
    
       if($user["profile_image"] == "") {
   
           $profile_image = "images/placeholder_men.jpg";
           http_response_code(200);
       }
       else {
           $profile_image = $user["profile_image"];
           http_response_code(200);
       }
   
   
       $cover_image = "";
   
       if($user["cover_image"] == "") {
   
           $cover_image = "images/placeholder_2.jpg";
           http_response_code(200);
       }
       else {
           $cover_image = $user["cover_image"];
           http_response_code(200);
       }
   
   
                                   
       $imageFriends= "";
   
      
       if($user["gender"] == "M") {
   
           $imageFriends = "images/placeholder_men.jpg";
           http_response_code(200);
   
       } 
       else {
   
           $imageFriends = "images/placeholder_women.jpg";
           http_response_code(200);
       }

        //* resquets

        if(isset($_POST["add"])) {
            $user_id = $url[2];
              
            $request = $modelRequests->sendRequest($user_id, $_SESSION["user_id"]);

            header("Location: /profile/".$user_id);
            
        }

    
   

       
   }
   else {
        //* get user
        if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
            http_response_code(400);
            require("views/view.error_400.php");
            exit;
        }

       if(is_numeric($_SESSION["user_id"])){
    
             $user_id = $_SESSION["user_id"];
    
        }
      
        $user = $modelUsers->getUser($user_id);
        
        if(empty($user)) {
            http_response_code(404);
            require("views/view.error_404.php");
            exit;
        }
    
    
    
       
        //* Create Posts

        if(isset($_POST["send"])) {
           
        
    
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
                    http_response_code(200);
                }
                else {
                    $message = "Error! Fill the fields correctly";
                    http_response_code(400);
                }
        }else {
            
            $message = "Error! Method not allowed";
            http_response_code(405);
        }


        //* get posts
        if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
            http_response_code(400);
            require("views/view.error_400.php");
            exit;
        }
    
        $posts = $modelPosts->getPosts($user_id);
       
        if(empty($posts)) {
            http_response_code(404);
            require("views/view.error_404.php");
            exit;
        }
    
    
        //* edit posts

        if(isset($_POST["edit"])) {
           var_dump($_POST["postid"]);
          
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
                    http_response_code(202);
                }
                else {
                    $message = "Error! Fill the fields correctly";
                    http_response_code(400);
                }
        }else {
            
            $message = "Error! Method not allowed";
            http_response_code(405);
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
                    http_response_code(200);
                    
                }
                else {
                    $message = "Error! Not found";
                    http_response_code(400);
                }
        }else {
            
            $message = "Error! Method not allowed";
            http_response_code(405);
        }
       
    
    
        
    
    
    
    
    
        //* comments
  
    
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
                    http_response_code(200);
                }    
                else {
                    $message = "Error! Fill the fields correctly";
                    http_response_code(400);
                }
            }else {
            
                $message = "Error! Method not allowed";
                http_response_code(405);
            }
            
           
    
    
            
                    
        //* likes
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
           
    
                header("Location: /profile");
                http_response_code(200);
            }    
            else {
                $message = "Error! Not found";
                http_response_code(400);
            }
        }else {
        
            $message = "Error! Method not allowed";
            http_response_code(405);
        }
    
        
         //* images
     
        $profile_image = "";
     
        if($user["profile_image"] == "") {
     
             $profile_image = "images/placeholder_men.jpg";
             http_response_code(200);
        }
        else {
             $profile_image = $user["profile_image"];
             http_response_code(200);
        }
     
     
        $cover_image = "";
     
        if($user["cover_image"] == "") {
     
             $cover_image = "images/placeholder_2.jpg";
             http_response_code(200);
        }
        else {
             $cover_image = $user["cover_image"];
             http_response_code(200);
        }
     
     
                                     
        $imageFriends= "";
     
        
        if($user["gender"] == "M") {
     
             $imageFriends = "images/placeholder_men.jpg";
             http_response_code(200);
     
        } 
        else {
     
             $imageFriends = "images/placeholder_women.jpg";
             http_response_code(200);
        }
         
     
        //* get friends
 
        if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
             http_response_code(400);
             require("views/view.error_400.php");
             exit;
        }
     
        $friends = $modelUsers->getFriends($user_id);
 
        if(empty($friends)) {
             http_response_code(404);
             require("views/view.error_404.php");
             exit;
        }
 
 
    }
     
 
    $title = "VirtualFriends";
 
    require("views/view.profile.php");
        
       
        
     
    
?>
    
        

 
        


        
        
        




    
   
