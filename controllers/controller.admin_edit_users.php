<?php




   
   

    $URI = urldecode($_SERVER['REQUEST_URI']);
    $url = explode ("/", $URI);

    $userid = $url[2];

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
            !empty($_POST["password"]) 
           

        
        
        ) {
            

            require("models/model.users.php");
 
            $modelUsers = new Users();

        
           

            $result = $modelUsers->editUser($_POST,$userid );
                
            
            
            

          

        }
        else {
            
            $message = "Error! Fill the fields correctly";
            http_response_code(400);
            
        }
        
    }



require("views/admin/admin_edit_users.php");
?>