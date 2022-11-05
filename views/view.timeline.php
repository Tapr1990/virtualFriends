<?php
    require("layout/header.php");
?>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
    <section>

        <div style="width:800px;margin:auto;min-height:400px;" >
            <div style="display: flex">
                <div style="min-height:400px;flex:1">
                    <div id="friends_bar">
                       <a href="/profile"><img src="/<?php echo $user["profile_image"]; ?>" id="photo"><br></a>
                       <a style="text-decoration:none;" href="/profile"><?php echo $user["first_name"] . " " . $user["last_name"]; ?></a>
                    </div>
                
                </div>
                <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px">
                    <div style="border:solid thin #aaa;padding: 10px;background-color:white">
                        <textarea placeholder="Whats on your mind?"></textarea>
                        <input id="post_button" type="submit" value="Post">
                        <br>
                    </div>
    
                   
                    
<?php
      
    foreach($posts as $post) {

        $post_id = $post["post_id"];    
        
        $likes = $modelLikes->getLikes($post_id, $_SESSION["user_id"]);
?>
        
    
                    <div class="post_bar">
                        <div class="post">
                            <div>
                          
                                <img src="<?php echo $post["profile_image"]; ?>" style="width:75px;height:75px;margin-right: 4px">
                            </div>
                            <div class="post_container">
                                <div style="font-weight:bold;color:#405d9b;">
                                <?php echo $post["first_name"] . " " . $post["last_name"]; ?>
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
                                        
                                        <input type="hidden" name="postid" value="<?php echo $post_id; ?>">
                                        <input id="post_button" type="submit" value="Delete" name="delete">
                                        <br>
                                    </form>    
                                    
                                        
                                    
                                </div>
                                <div>
                                <div style="border:solid thin #aaa;padding: 10px;background-color:white">
                                    
                                    <form method="post" action="/profile">
                                        <input type="text" name="update" placeholder="edit post">
                                        <input type="hidden" name="postid" value="<?php echo $post_id; ?>">
                                        <input id="post_button" type="submit" value="Edit" name="edit">
                                        <br>
                                    </form>
    
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
                                  <input type="submit" name="sendcomment" value="send">
                              </div>
                            </form>
                          
                           
                             
                  
                    </div>                              
<?php
    }
?>
                      
                                
                            
                        
                    </div>
                   
                </div>
    
            </div>
        </div>
    </section>

<?php
    require("layout/footer.php");
?>