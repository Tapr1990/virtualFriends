<?php
    require("layout/header.php");
?>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
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
    <section>

        <div style="width:800px;margin:auto;min-height:100px;" >
           
          
             
    
                <div>
                    <h2>About</h2>
<?php
                //foreach($results as $result) {
                    echo'
                        <div>
                            <dl>
                                <dt>Country</dt>
                                <dd></dd>
                                <dt>city</dt>
                                <dd></dd>
                                <dt>Birth Date</dt>
                                <dd></dd>
                                <dt>School</dt>
                                <dd></dd>
                                <dt>University</dt>
                                <dd></dd>
                                <dt>Job</dt>
                                <dd></dd>
                                
                            </dl>                    
                        </div>
                    ';
                //}          
?>
                   
    
                </div>
        </div>
    </section>
<?php
    require("layout/footer.php");
?>
        

        
                
              
                

        

