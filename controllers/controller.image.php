<?php
  
   
  require("models/model.users.php");

  $modelImages = new Users();
   
 

    //* Profile Image
    if(isset($_POST["send"]) && isset($_FILES["image1"])) {
       
      
      if($_FILES["image1"]["type"] == "image/jpeg") {

        
          $size = (1024 * 1024) * 3;// 3 megabytes
         
          if($_FILES["image1"]["size"] < $size) {

            $filename = "uploads/" . $_FILES["image1"]["name"];

            move_uploaded_file($_FILES["image1"]["tmp_name"], $filename );

     
            if(file_exists($filename)) {

          
              $user_id = $_SESSION["user_id"];
     
     
              $profileImages = $modelImages->insertProfileImage($filename, $user_id);
     
     
     
              header("Location: /profile");
            }

          }
          else {
            $message = "Error! Add a valid image size!";
          }
      } 
      else {
          $message = "Error! Add a valid image type!";
      }

    }
    else {

      $message = "Error! Add an image!";
    }



    //* Background-Image
    if(isset($_POST["send"]) && isset($_FILES["image2"])) {
       

      if($_FILES["image2"]["type"] == "image/jpeg") {

          $size = (1024 * 1024) * 3;
          if($_FILES["image2"]["size"] < $size) {

            $filename = "uploads/" . $_FILES["image2"]["name"];
            move_uploaded_file($_FILES["image2"]["tmp_name"], $filename );
     
            if(file_exists($filename)) {
     
     
              $user_id = $_SESSION["user_id"];
     
     
              $backgroundImages = $modelImages->insertBackgroundImage($filename, $user_id);
     
              header("Location: /profile");
            }

          }
          else {
            $message = "Error! Add a valid image size!";
          }
      } 
      else {
          $message = "Error! Add a valid image type!";
      }

    }
    else {

      $message = "Error! Add an image!";
    }




     
       

    $title = "VirtualFriends";

    require("views/view.image.php");

   

 


   

?>

