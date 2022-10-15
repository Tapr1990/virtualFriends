<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style type="text/css">
        #blue_bar {
            height:50px;
            background-color:#405d9b;
            color:#d9dfeb;
         
        }
        #search_box{
            width: 400px;
            height: 20px;
            border-radius: 5px;
            border: none;
            padding: 4px;
            font-size: 14px;
        }
        #menu_buttons {
            width: 100px;
            display: inline-block;
            margin: 2px;
        }
        #friends_img {
            width:75px;
            margin: 8px;
            float: left;
        }
        #friends_bar {
            min-height:400px;
            margin-top: 20px;
            background-color:white;
            color: #aaa;
            padding: 8px;
        }
        #friends {
            clear: both;
            font-size: 12px;
            font-weight: bold;
            border: solid 2px white;
            color: #405d9b;
        }
        textarea {
            width: 100%;
            border: none;
            font-family: tahoma;
            font-size: 14px;
            height: 50px;
        }
        #post_button {
            float: right;
            background-color:#405d9b;
            border: none;
            color: white;
            padding: 4px;
            font-size: 14px;
            border-radius: 2px;
            width: 50px;
        }
        #post_bar {
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
        #post {
            padding: 4px;
            font-size: 13px;
            display: flex;
        }

    </style>
</head>
<body style="font-family:tahoma;background-color:#d0d8e4;" >
    <br>    
    <div id="blue_bar">
        <div style="width:800px;margin:auto;font-size:30px">

        <a style="color:white;text-decoration:none;" href="/timeline">VirtualFriends &nbsp &nbsp</a> <input type="text" id="search_box" placeholder="Search">
        <img src="/<?php echo $user["profile_image"]; ?>" style="width:50px;height:50px;float:right;">

        <a href="/logout">
            <span style="font-size:15px;float:right;margin:10px;color:white;">Logout</span>
        </a>


        </div>
    </div>

    <div style="width:800px;margin:auto;min-height:400px;" >
        <div style="background-color:white;text-align:center;color:#405d9b">
        <img src="/<?php echo $user["cover_image"]; ?>" style="width:100%;">
        <span style="font-size: 12px">
            <a style="text-decoration: none;color:#00ff;float:left;" href="/image">Edit Background-Image</a>

            <img src="/<?php echo $user["profile_image"]; ?>" style=" width: 100px;margin-top: -100px; border-radius: 50%;border: solid 2px white;"><br/>
            <a style="text-decoration: none;color:#00ff;" href="/image">Edit Profile Image</a>

        </span>
        <br>

        <div style="font-size:20px"><?php echo $user["first_name"] . " " . $user["last_name"]; ?></div>
        <br>
        <div id="menu_buttons"><a href="/timeline">Timeline</a></div>
        <div id="menu_buttons">About</div>
        <div id="menu_buttons">Friends</div>
        <div id="menu_buttons">Photos</div>
        <div id="menu_buttons">Settings</div>
        
        </div>
        <div style="display: flex">
            <div style="min-height:400px;flex:1">

                <div id="friends_bar">
                    Friends<br>
<?php
    foreach($friends as $friend) {
?>
   
                    <div id="friends">
                        <a href="/profile/<?php echo $friend["user_id"]; ?>">
                            <img id="friends_img" src="<?php echo $imageFriends; ?>" style="width:75px;height:75px">
                            <br>
                            <?php echo $friend["first_name"] ." ". $friend["last_name"]; ?>
                        </a>

                        
                    </div>
<?php
    }
?>
                </div>
                 
            
            </div>
            <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px">
                <div style="border:solid thin #aaa;padding: 10px;background-color:white">

                    <form method="POST" enctype="multipart/form-data" action="/profile">
                        <textarea name="post" placeholder="Whats on your mind?"></textarea>
                        <input type="file" name="file">
                        <input id="post_button" type="submit" name="send" value="Post">
                        <br>
                    </form>

                </div>
<?php
    foreach($posts as $post) {

        $post_user = $modelUsers->getUser($post["user_id"]);
    
?>
    

                <div id="post_bar">
                    <div <?php $post["post_id"]; ?> id="post">
                        <div>
                      
                            <img src="<?php echo $user["profile_image"]; ?>" style="width:75px;height:75px;margin-right: 4px">
                        </div>
                        <div>
                            <div style="font-weight:bold;color:#405d9b;">
                                <?php echo $post_user["first_name"] . " " . $post_user["last_name"]; ?>
                            </div>
                            <p><?php echo $post["post"]; ?></p>
                            <br/><br/>
                            <a href="#">Like</a> . <a href="#">Comment</a> . <span style="color:#999"><?php echo $post["date"]; ?></span>
                        </div>
                    </div>
                </div>
<?php
    }
?>
                                
                            
                 
               
            </div>

        </div>
    </div>


</body>
</html>