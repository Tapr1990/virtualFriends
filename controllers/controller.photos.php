<?php
    require("models/model.photos.php");

    $model = new Photos();

    if(isset($_POST["insert"]) && isset($_FILES["photo"])) {
        
        
        
        
            if($_FILES["photo"]["type"] == "image/jpeg") {

            
                $size = (1024 * 1024) * 3;// 3 megabytes
            
                if($_FILES["photo"]["size"] < $size) {

                    $filename = $_FILES["photo"]["name"];

                    $path = pathinfo($filename, PATHINFO_EXTENSION);

                    $path = strtolower($path);

                    $newFileName = uniqid( time() ) . "." . $path;
                    
                    $file = "uploads/" . $newFileName;

                    move_uploaded_file($_FILES["photo"]["tmp_name"], $file );

        
                    if(file_exists($file)) {


                        $user_id = $_SESSION["user_id"];
            
            
                        $result = $model->insertPhotos($file, $user_id);
            
            
            
                        header("Location: /photos");
                        http_response_code(200);
                    }

                }
                else {
                    $message = "Error! Add a valid photo size!";
                    http_response_code(400);
                }
            } 
            else {
                $message = "Error! Add a valid photo type!";
                http_response_code(400);
                
            
            }
       

    }
    else {

        $message = "Error! Add an photo!";
        http_response_code(405);
    }


    //* get photos

    if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }

    $photos = $model->getPhotos($_SESSION["user_id"]);

    if(empty($photos)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }



    if(isset($_POST["remove"])) {
       
       
        if(
           
           
            !empty($_POST["photoid"]) &&
            is_numeric($_POST["photoid"]) 
          
        ) { 
    
            $photoid = $_POST["photoid"];
           
            
            

            $delete = $model->deletePhoto($photoid);
           

            header("Location: /photos");
            http_response_code(200);

        } else {
            $message = "Error! Bad Request";
            http_response_code(400);
        }
    }else {
    
        $message = "Error! Method not allowed";
        http_response_code(405);
    }

    
        

    require("models/model.users.php");

    if(empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }

    if(is_numeric($_SESSION["user_id"])){

        $user_id = $_SESSION["user_id"];

    }
 
  
    $modelUsers = new Users();

    $user = $modelUsers->getUser($user_id);

    if(empty($user)) {
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    

    $profile_image = "";
    
    if($user["profile_image"] == "") {

        $profile_image = "images/placeholder_men.jpg";
        http_response_code(200);
    }
    else {
        $profile_image = $user["profile_image"];
        http_response_code(200);
    }


    $cover_image = "";

    if($user["cover_image"] == "") {

        $cover_image = "images/placeholder_2.jpg";
        http_response_code(200);
    }
    else {
        $cover_image = $user["cover_image"];
        http_response_code(200);
    }



    $title = "VirtualFriends";

    require("views/view.photos.php");


?>

