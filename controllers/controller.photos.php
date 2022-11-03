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
                    }

                }
                else {
                $message = "Error! Add a valid photo size!";
                }
            } 
            else {
                $message = "Error! Add a valid photo type!";
            }
       

    }
    else {

        $message = "Error! Add an photo!";
    }



    $photos = $model->getPhotos($_SESSION["user_id"]);



    if(isset($_POST["remove"])) {
       
       
        if(
           
           
            !empty($_POST["photoid"]) &&
            is_numeric($_POST["photoid"]) 
          
        ) { 
    
            $photoid = $_POST["photoid"];
           
            
            

            $delete = $model->deletePhoto($photoid);
           

            header("Location: /photos");
            
        }
        else {
            $message = "";
        }
    }

    require("models/model.users.php");

    if(is_numeric($_SESSION["user_id"])){

        $user_id = $_SESSION["user_id"];

    }
 
  
    $modelUsers = new Users();

    $user = $modelUsers->getUser($user_id);

    

    $profile_image = "";
    
    if($user["profile_image"] == "") {

        $profile_image = "images/placeholder_men.jpg";
    }
    else {
        $profile_image = $user["profile_image"];
    }


    $cover_image = "";

    if($user["cover_image"] == "") {

        $cover_image = "images/placeholder_2.jpg";
    }
    else {
        $cover_image = $user["cover_image"];
    }



    $title = "VirtualFriends";

    require("views/view.photos.php");


?>

