<?php

    require("models/model.users.php");

    $modelUers = new Users();

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