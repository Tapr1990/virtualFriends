<?php

    if(isset($_POST["send"])) {

                    

        if(
        
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            $_POST["password"] === $_POST["password2"] &&
            mb_strlen($_POST["first_name"]) >= 3 &&
            mb_strlen($_POST["first_name"]) <= 50 &&
            mb_strlen($_POST["last_name"]) >= 3 &&
            mb_strlen($_POST["last_name"]) <= 50 &&
            mb_strlen($_POST["password"]) >= 8 &&
            mb_strlen($_POST["password"]) <= 1000 &&
            !is_numeric($_POST["first_name"]) &&
            !is_numeric($_POST["last_name"]) && 
            !empty($_POST["email"]) &&
            !empty($_POST["first_name"]) &&
            !empty($_POST["last_name"]) &&
            !empty($_POST["password"]) 

        
        
        ) {

            require("models/model.users.php");

            $modelUsers = new Users();

            $user_id = $modelUsers->createUsers($_POST);


        
            if(!empty($user_id)) {
                $_SESSION["user_id"] = $user_id;
                header("location: /adminusers");
                
            } else {
                $message = "User already exists";
            }
        }

    } else {
        $message = "Fill the fields correctly";
    }





    $title= "Admin Page - Virtual Friends";

    require("views/admin/adminnewuser.php");

?>