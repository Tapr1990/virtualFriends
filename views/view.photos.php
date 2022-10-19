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
        #photo img{
            margin: auto 10px;
        }

    </style>
</head>
<body style="font-family:tahoma;background-color:#d0d8e4;" >
    <br>    
    <div id="blue_bar">
        <div style="width:800px;margin:auto;font-size:30px">

        VirtualFriends &nbsp &nbsp <input type="text" id="search_box" placeholder="Search">
        <img src="views/images/selfie.jpg" style="width:50px;float:right;">
        <a href="/logout">
            <span style="font-size:15px;float:right;margin:10px;color:white;">Logout</span>
        </a>
        </div>
    </div>
    <div style="width:800px;margin:auto;min-height:100px;" >
       
      
            <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px">
                <h1>insert Photos</h1>
                <form method="Post" enctype="multipart/form-data" action="/photos">
                    <div style="border:solid thin #aaa;padding: 10px;background-color:white">
                        <input type="file" name="photo">
                        <input id="post_button" type="submit" value="Insert" name="insert">
                        <br>
                    </div>
                </form>
            </div>

            <div>
                <h2>Photos</h2>
<?php
 foreach($photos as $photo) {
?>
                <img id="photo" src="<?php echo $photo["photo"]; ?>" alt=""  width="200" height="200">
                <form method="post" action="/photos">
                                    
                    <input type="hidden" name="photoid" value="<?php echo $photo["photo_id"]; ?>">
                    <input type="submit" value="x" name="remove">
                    <br>
                </form>  
<?php
 }
?>
            </div>
    </div>

        

        
                
              
                

        

</body>
</html>