<?php

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        
        $data = json_decode(file_get_contents("php://input"), true);

        var_dump($data);
    }
       
        
       
        
       

        
          
        

 





    $title= "Admin Page - Virtual Friends";

    require("views/admin/adminnewuser.php");

?>