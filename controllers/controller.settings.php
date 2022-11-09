<?php

   

    if(isset($_POST["send"])) {

                

        if(
        
            mb_strlen($_POST["country"]) >= 2 &&
            mb_strlen($_POST["country"]) <= 60 &&
            mb_strlen($_POST["city"]) >= 3 &&
            mb_strlen($_POST["city"]) <= 60 &&
            mb_strlen($_POST["birth_date"]) >= 2 &&
            mb_strlen($_POST["birth_date"]) <= 60 &&
            mb_strlen($_POST["school"]) >= 5 &&
            mb_strlen($_POST["school"]) <= 60 &&
            mb_strlen($_POST["university"]) >= 5 &&
            mb_strlen($_POST["university"]) <= 60 &&
            mb_strlen($_POST["job"]) >= 5 &&
            mb_strlen($_POST["job"]) <= 60 
           
          
     
        ) {
            
                require("models/model.about.php");
            
                $modelAbout = new About();

                $user_id = $_SESSION["user_id"];
                $country = $_POST["country"];
                $city = $_POST["city"];
                $birth_date = $_POST["birth_date"];
                $school = $_POST["school"];
                $university = $_POST["university"];
                $job = $_POST["job"];

            
                $user = $modelAbout->about($user_id,$country,$city,$birth_date,$school,$university,$job);

                //var_dump($user);
            
                header("Location: /profile");
                http_response_code(200);
        }
           
         else {
            $message = "Error! Fill the fields correctly";
            http_response_code(400);
        }
    }

    require("models/model.users.php");

    $modelUsers = new Users();

    $userid = $_SESSION["user_id"];
      

    $user = $modelUsers->getUser($userid);

    
    $profile_image = "";
    
    if($user["profile_image"] == "") {

        $profile_image = "images/person-placeholder.jpg";
       
    }
    else {
        $profile_image = $user["profile_image"];
       
    }
           
            

          
    
    $title = "VirtualFriends";

    require("views/view.settings.php");
        
?>
        
    
        
       
    
    



