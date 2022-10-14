<?php
    
   require("models/model.users.php");
   require("models/model.posts.php");
  
   
   $modelUsers = new Users();
   
   $user = $modelUsers->getUser($_SESSION["user_id"]);


   //$user_id = $_SESSION["user_id"];
   

   $modelPosts = new Posts();

    

    if(isset($_POST["send"]) || isset($_FILES["file"])) {
       
        //var_dump($_FILES);
        print_r($_POST);

            if(
                !empty($_FILES["file"]["name"]) ||
                !empty($_POST["post"]) &&
                mb_strlen($_POST["post"]) >= 10 &&
                mb_strlen($_POST["post"]) <= 200 
              
              
            ) { 

                
                $user = $_SESSION["user_id"];

                $result = $modelPosts->createPost($user, $_POST, $_FILES);
                print_r($result);

                header("Location: /profile");
            }
            else {
                $message = "";
            }
    }



 



    

    $posts = $modelPosts->getPosts();
    //var_dump($posts);

                                
    $imageFriends= "";

   
    if($user["gender"] == "M") {

        $imageFriends = "views/images/placeholder_men.jpg";

    } 
    else {

        $imageFriends = "views/images/placeholder_women.jpg";
    }


    $user_id = $_SESSION["user_id"];

    $friends = $modelUsers->getFriends($user_id);


    
   




    $title = "VirtualFriends";

    require("views/view.profile.php");
?>