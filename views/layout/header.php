<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bc3418e67d.js" crossorigin="anonymous"></script>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/styles.css">  
</head>
<body style="font-family:tahoma;background-color:#d0d8e4;" >
<?php
         if(isset($_POST["submit"])) {
            if(!empty($_POST["find"])) {
 
                $searchs = $modelUsers->findUser($_POST["find"]);
                foreach($searchs as $search) {

                    echo'
                        <div>
                            <a href="/profile/' .$search["user_id"]. '">
                                <p>' .$search["first_name"]. '</p>
                                <img src="' .$search["profile_image"]. '" width= 50px height= 50px >
                            </a>
                        </div>

                    ';
                }
            }
                
    
        }


?>
    <header>
        <div class="blue_bar">
            <form method="post" action="/profile">
                <div style="width:800px;margin:auto;font-size:30px">
                    <a style="color:white;text-decoration:none;" href="/timeline">VirtualFriends &nbsp &nbsp</a> 
                    <input type="text" id="search_box" name="find" placeholder="Search" aria-label="search">
                    <button type="submit" name="submit">&#128269;</button>
                    <img src="/<?php echo $user["profile_image"]; ?>" style="width:50px;height:50px;float:right;">
                    <a href="/logout">
                        <span style="font-size:15px;float:right;margin:10px;color:white;">Logout</span>
                    </a>
                </div>
            </form>
        </div>
    </header>
    <main>