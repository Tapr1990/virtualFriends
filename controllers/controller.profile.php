<?php
    
   require("models/model.users.php");
   require("models/model.posts.php");



   if(is_numeric($_SESSION["user_id"])){

         $user_id = $_SESSION["user_id"];

    }
  
   
   $modelUsers = new Users();


   
   $user = $modelUsers->getUser($user_id);


   //$user_id = $_SESSION["user_id"];
   

   $modelPosts = new Posts();

    

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

                $result = $modelPosts->createPost($user, $_POST);
                //print_r($result);

                header("Location: /profile");
            }
            else {
                $message = "";
            }
    }



 



    

    $posts = $modelPosts->getPosts($user_id);
    //var_dump($posts);

                                
    $imageFriends= "";

   
    if($user["gender"] == "M") {

        $imageFriends = "views/images/placeholder_men.jpg";

    } 
    else {

        $imageFriends = "views/images/placeholder_women.jpg";
    }


    

    $friends = $modelUsers->getFriends($user_id);


    
   




    $title = "VirtualFriends";

    require("views/view.profile.php");
?>