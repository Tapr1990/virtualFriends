<?php

    require("models/model.users.php");

    $modelUers = new Users();


    if(isset($_POST["edit"])) {

        

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
            !empty($_POST["password"]) &&
            !empty($_POST["userid"]) &&
            is_numeric($_POST["userid"]) 

        
        
        ) {
            $user_id = $_POST["userid"];

            $result = $modelUsers->editUser($_POST, $user_id);
                
            header("Location: /adminusers");
            
            

          

        }
        else {
            $message = "erro";
        }
        
    }
                            

        if(isset($_POST["delete"])) {
            
            
            if(
                !empty($_POST["userid"]) &&
                is_numeric($_POST["userid"]) 
            ) { 
            
                $userid = $_POST["userid"];
            
                $result = $modelUers->deleteUser($userid);
            
                header("Location: /adminusers");
            }
            else {
                $message = "";
            }
        }
        
            
                
                

        $users = $modelUers->getAllUsers();

        function esc($str) {
            return htmlspecialchars($str ?? '');
        }
            

                

        
    $title= "Admin Page - Virtual Friends";

    require("views/admin/adminusers.php");
        
        
?>
        

  

    

    

     
 
       
        
    
                
    