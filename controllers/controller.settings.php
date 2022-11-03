<?php

   

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
            !empty($_POST["country"]) &&
            !empty($_POST["city"]) &&
            !empty($_POST["birth_date"]) &&
            !empty($_POST["school"]) &&
            !empty($_POST["university"]) && 
            !empty($_POST["job"]) 
          
            /*!is_numeric($_POST["country"]) &&
            !is_numeric($_POST["city"]) && 
            !is_numeric($_POST["school"]) && 
            !is_numeric($_POST["university"]) && 
            !is_numeric($_POST["job"])*/  
        ) {
            
                require("models/model.about.php");
            
                $modelAbout = new About();

                $user_id = $_SESSION["user_id"];


            
                $user = $modelAbout->about($_POST, $user_id);

                //var_dump($user);
            
                header("Location: /profile");
        }
           
    } else {
        $message = "Fill the fields correctly";
    }
           
            

          
    
    $title = "VirtualFriends";

    require("views/view.settings.php");
        
?>
        
    
        
       
    
    



