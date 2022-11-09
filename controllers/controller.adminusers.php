<?php

    require("models/model.users.php");

    $modelUsers = new Users();


  
 
                            

        if(isset($_POST["delete"])) {
            
            
            if(
                !empty($_POST["userid"]) &&
                is_numeric($_POST["userid"]) 
            ) { 
            
                $userid = $_POST["userid"];
            
                $result = $modelUsers->deleteUser($userid);
            
                header("Location: /adminusers");
            }
            else {
                $message = "Error!";
                http_response_code(400);
            }
        }
        
            
                
                

        $users = $modelUsers->getAllUsers();

        function esc($str) {
            return htmlspecialchars($str ?? '');
        }
            

                

        
    $title= "Admin Page - Virtual Friends";

    require("views/admin/adminusers.php");
        
        
?>
        

  

    

    

     
 
       
        
    
                
    