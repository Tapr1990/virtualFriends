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
                <div id="post_bar">
                    <div id="post">
                        <div>
                            <img src="views/images/user1.jpg" style="width:75px;height:75px;margin-right: 4px">
                        </div>
                        <div>
                            <div style="font-weight:bold;color:#405d9b;">Leonel Messi</div>
                            Tenho mais bolas de ouro que tu!!lol
                            <br/><br/>
                            <a href="#">Like</a> . <a href="#">Comment</a> . <span style="color:#999">September 26 2022</span>
                        </div>
                  
                            
                        
                    </div>
                </div>
                <div id="post_bar">
                    <div id="post">
                        <div>
                            <img src="views/images/user2.jpg" style="width:75px;height:75px;margin-right: 4px">
                        </div>
                        <div>
                            <div style="font-weight:bold;color:#405d9b;">Ricardo Quaresma</div>
                            Olha para essa foto de perfil, depois o cigano sou eu!!lol
                            <br/><br/>
                            <a href="#">Like</a> . <a href="#">Comment</a> . <span style="color:#999">September 26 2022</span>
                        </div>
                  
                            
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>