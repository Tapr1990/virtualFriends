<?php

   /* if(isset($_POST["send"])) {

                    

        if(
        
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            $_POST["newpassword1"] === $_POST["newpassword2"] &&
            mb_strlen($_POST["first_name"]) >= 3 &&
            mb_strlen($_POST["first_name"]) <= 50 &&
            mb_strlen($_POST["last_name"]) >= 3 &&
            mb_strlen($_POST["last_name"]) <= 50 &&
            mb_strlen($_POST["newpassword1"]) >= 8 &&
            mb_strlen($_POST["newpassword1"]) <= 1000 &&
            !is_numeric($_POST["first_name"]) &&
            !is_numeric($_POST["last_name"]) && 
            !empty($_POST["email"]) &&
            !empty($_POST["first_name"]) &&
            !empty($_POST["last_name"]) &&
            !empty($_POST["newpassword1"]) 

        
        
        ) {

            require("models/model.users.php");

            $modelUsers = new Users();

            $user = $modelUsers->updateUsers($_POST);

            header("Location: /profile");

        
    
        }

    } else {
    $message = "Fill the fields correctly";
    }*/

    if(isset($_POST["send"])) {

                

        if(
        
            mb_strlen($_POST["country"]) >= 2 &&
            mb_strlen($_POST["country"]) <= 60 &&
            mb_strlen($_POST["city"]) >= 3 &&
            mb_strlen($_POST["city"]) <= 60 &&
            mb_strlen($_POST["birth_date"]) >= 5 &&
            mb_strlen($_POST["birth_date"]) <= 60 &&
            mb_strlen($_POST["school"]) >= 10 &&
            mb_strlen($_POST["school"]) <= 60 &&
            mb_strlen($_POST["university"]) >= 10 &&
            mb_strlen($_POST["university"]) <= 60 &&
            mb_strlen($_POST["job"]) >= 10 &&
            mb_strlen($_POST["job"]) <= 60 &&
            !is_numeric($_POST["country"]) &&
            !is_numeric($_POST["city"]) && 
            !is_numeric($_POST["school"]) && 
            !is_numeric($_POST["university"]) && 
            !is_numeric($_POST["job"])  
        ) {
            
                require("models/model.about.php");
            
                $modelAbout = new About();

                $user_id = $_SESSION["user_id"];
            
                $user = $modelAbout->about($user_id, $_POST);
            
                header("Location: /settings");
        }
           
    } else {
        $message = "Fill the fields correctly";
    }
           
            

          
    
    $title = "VirtualFriends";

    require("views/view.settings.php");
        
?>
        
    
        
       
    
    



