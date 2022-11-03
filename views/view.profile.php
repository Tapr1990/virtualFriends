<?php
    require("layout/header.php");
?>

        
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
    
<?php
    require("layout/footer.php")
?>
                    
                    
                    
                    
    
                    
                    
    


        


