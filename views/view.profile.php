<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bc3418e67d.js" crossorigin="anonymous"></script>
    <title><?php echo $title; ?></title>
  
    <style type="text/css">
        .blue_bar {
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
        .menu_buttons {
            width: 100px;
            display: inline-block;
            margin: 2px;
        }
        .friends_img {
            width:75px;
            margin: 8px;
            float: left;
        }
        .friends_bar {
            min-height:400px;
            margin-top: 20px;
            background-color:white;
            color: #aaa;
            padding: 8px;
        }
        .friends {
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
        .post_button {
            float: right;
            background-color:#405d9b;
            border: none;
            color: white;
            padding: 4px;
            font-size: 14px;
            border-radius: 2px;
            width: 50px;
        }
        .delete_button, .like, .unlike  {
            background-color: #405d9b;
            border: none;
            color: white;
            padding: 4px;
            font-size: 14px;
            border-radius: 2px;
        }
            
        
            
        .post_bar {
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
        .post {
            padding: 4px;
            font-size: 13px;
            display: flex;
        }
        main {
            width:800px;
            margin:auto;
            min-height:400px;
        }
        .modal {
            width: 500px;
            height: 500px;
            background-color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            animation: animate;
            animation-duration: 800ms;
        }
        @keyframes animate {
            from{opacity: 1;}
            from{opacity: 0;}
        }

    </style>
    

    <script>

    </script>


    
   
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
        
        <section>
            <div style="background-color:white;text-align:center;color:#405d9b">
                <img src="/<?php echo $cover_image; ?>" style="width:100%;">
                <span style="font-size: 12px">
                    <a style="text-decoration: none;color:#00ff;float:left;" href="/image">Edit Background-Image</a>
        
                    <img src="/<?php echo $profile_image; ?>" style=" width: 100px;margin-top: -100px; border-radius: 50%;border: solid 2px white;"><br/>
                    <a style="text-decoration: none;color:#00ff;" href="/image">Edit Profile Image</a>
        
                </span>
                <form method="post" action="/profile">
                    <input type="hidden" name="usertid" value="<?php echo $user["user_id"]; ?>">
                    <input style="margin-right:10px;background-color: #9b409a" class="post_button" type="submit" name="send" value="like">
                </form>
                <br>
        
                <div style="font-size:20px"><?php echo $user["first_name"] . " " . $user["last_name"]; ?></div>
                <br>
                <div class="menu_buttons"><a href="/timeline">Timeline</a></div>
                <div class="menu_buttons"><a href="/about">About</a></div>
                <div class="menu_buttons"><a href="/friends">Friends</a></div>
                <div class="menu_buttons"><a href="/photos">Photos</a></div>
                <div class="menu_buttons"><a href="/settings">Settings</a></div>
            </div>    
        </section>

       
                <section style="display: flex">
                    <div style="min-height:400px;flex:1">
        
                        <div class="friends_bar">
                            Friends
<?php
        
        
    foreach($friends as $friend) {
?>
           
                            <div class="friends">
                               
                                <a href="/profile/<?php echo $friend["user_id"]; ?>">
                                    <div>
                                        <img class="friends_img" src="<?php echo $imageFriends; ?>" style="width:75px;height:75px">
                                    </div>
                                    <br>
                                    <div>
                                        <p><?php echo $friend["first_name"] ." ". $friend["last_name"]; ?>
                                    </div>
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
                                <input class="post_button" type="submit" name="send" value="Post">
                                <br>
                            </form>
                            
                        </div>
                    
                
<?php
            
    foreach($posts as $post) {
                
        $post_user = $modelUsers->getUser($post["user_id"]);
                
        $post_id = $post["post_id"];

        $likes = $modelLikes->getLikes($post_id, $_SESSION["user_id"]);
                
        //var_dump($post_id);
        
?>     
            
        
                        <div data-post_id="<?php echo $post_id; ?>" class="post_bar">
                            <div class="post">
                                <div>
                              
                                    <img src="<?php echo $user["profile_image"]; ?>" style="width:75px;height:75px;margin-right: 4px">
                                </div>
                                <div class="post_container">
                                    <div style="font-weight:bold;color:#405d9b;">
                                        <?php echo $post_user["first_name"] . " " . $post_user["last_name"]; ?>
                                    </div>
                                    <p><?php echo $post["post"]; ?></p>
                                    <div>
                                        <?php
                                            foreach($likes as $like) {
                                        ?>
                                        <form method="post" action="/profile">
                                            <input type="hidden" name="postid" value="<?php echo $post_id ;?>">
                                            <button type="submit" name="like" class="like"><i class="fas fa-thumbs-up"></i>&nbsp;</button>
                                            <p><?php echo $like["likes"] ;?> people like this</p>
                                        </form>
                                        <?php
                                            }
                                        ?>
                                       
                                    </div>
  
                                    <div stye="color: #999;float:left;">
                                       
                                       
                                        <form method="post" action="/profile">    
                                            <input type="hidden" name="postid" value="<?php echo $post_id ;?>">
                                            <input class="delete_button" type="button" value="Delete" name="delete">
        
                                        </form>
                                           
                                        
                                        
                                            
                                        
                                    </div>
                                    <div>
                                    <div>
                                        <button class="edit-button" onclick="edit(<?php echo $post_id; ?>)">Edit</button>
                                        <div class="modal">
                                            <form method="post" action="/profile">
                                                <textarea name="update" placeholder="Edit post"></textarea>
                                                <input type="hidden" name="postid" value="<?php echo $post_id; ?>">
                                                <input class="post_button" type="submit" value="Edit" name="edit">
                                            </form>
                                        </div>
                                    </div>
                                               

        
                                    </div>
                                </div>
                            </div>
               
                        </div>
                        <div>
                                <form method="post" action="/profile">
                                  
                                    <div>
                                        <textarea style="border:1px solid #405d9b;" name="comment" required placeholder="comment this post"></textarea>
                                        <input type="hidden" name="postid" value="<?php echo $post_id; ?>">
                                        <input class="send_button"type="submit" name="sendcomment" value="send">
                                    </div>
                    
                                </form>
<?php 
        if($_SESSION["user_id"] == $user["user_id"]) {
        
                    $results = $modelComments->getComments($post_id, $user_id);
                    foreach($results as $result) { 
                        echo '
                        
                            <p>' .$result["comment"]. '</p>
                        
                        
                        ';
                    }
                } elseif($url[2] != $_SESSION["user_id"]) {
                
                    $comments = $modelComments->getComments($post_id, $user_id);
                    foreach($comments as $comment) { 
                        echo '
                        
                            <p>' .$comment["comment"]. '</p>
                        
                        
                        ';
                    }
        
                } else {
                    echo 'erro';
                }
        
?>
                        </div>                              
        
                      
<?php
    }
?>
                                    
                         
                       
                    </div>
        
                </div>
            </div>
        </section>
    </main>
</body>
</html>
                    
                    
                    
                    
    
                    
                    
    


        


