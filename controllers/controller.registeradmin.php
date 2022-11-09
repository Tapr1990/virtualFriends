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

            require("models/model.admin.php");

            $model = new Admin();

            $admin_id = $model->createAdmin($_POST);


        
            if(!empty($admin_id)) {
                $_SESSION["admin_id"] = $admin_id;
                header("Location: /admin");
            } else {
                $message = "Administrator already exists";
            }
        }

    } else {
    $message = "Fill the fields correctly";
    }

 

    $title = "VirtualFriends";

    require("views/view.registeradmin.php");
?>