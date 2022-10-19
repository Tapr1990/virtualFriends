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
        #photo {
            width: 150px;
           
            border-radius: 50%;
            border:solid 2px white;
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
           
           
            padding: 8px;
            text-align: center;
            font-size: 20px;
            color: #405d9b;
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

        VirtualFriends &nbsp &nbsp <input type="text" id="search_box" placeholder="Search">
        <a href="/profile"><img src="/<?php echo $user["profile_image"]; ?>" style="width:50px;height:50px;float:right;"></a>
        <a href="/logout">
            <span style="font-size:15px;float:right;margin:10px;color:white;">Logout</span>
        </a>
        </div>
    </div>
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

                <!--posts-->
                <div id="post_bar">
<?php
  
    foreach($posts as $post) {

        //$post_user = $modelUsers->getUser($post["user_id"]);
        //$profile_image = $modelUsers->getUser($post["profile_image"]);

        //$post_id = $post["post_id"];

        
      
    
?>
    

                <div data-post_id="" id="post_bar">
                    <div id="post">
                        <div>
                      
                            <img src="<?php echo $post["profile_image"]; ?>" style="width:75px;height:75px;margin-right: 4px">
                        </div>
                        <div>
                            <div style="font-weight:bold;color:#405d9b;">
                            <?php echo $post["first_name"] . " " . $post["last_name"]; ?>
                            </div>
                            <p><?php echo $post["post"]; ?></p>
                            <br/><br/>
                            <div>
                                
                            

                                   <button class ="like-button" name="like" type="button">
                                        <input type="hidden" name="postid" value="<?php echo $post_id; ?>">
                                        <span>Like</span>
                                        <span class="count">0</span>
                                    </button>

                              
                                
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

</body>
</html>