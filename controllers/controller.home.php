<?php

    if(isset($_POST["send"])) {
        if(
            !empty($_POST["email"]) &&
            !empty($_POST["password"]) &&
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            mb_strlen($_POST["password"]) >= 8 &&
            mb_strlen($_POST["password"]) <= 1000
        ) {
            require("models/model.users.php");
            $model = new Users();

            $user = $model->loginUser($_POST);

            if(!empty($user)) {
                $_SESSION["user_id"] = $user["user_id"];

                header("Location: /profile");
              
                
            } else {
                $message = "Error! User Not Exists";
                http_response_code(404);
            }
        } else {
            $message = "Error! Incorrect data, confirm the email or password";
            http_response_code(400);
        }

    }


    $title = "VirtualFriends";

    require("views/view.home.php");
?>