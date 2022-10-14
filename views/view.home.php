<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        #bar1 {
            height:100px;
            background-color:rgb(59,89,152);
            color:#d9dfeb;
            padding: 4px;
        }
    
        #bar2 {
            background-color:white;
            width:800px;
            height:400px;
            margin:auto;
            margin-top:50px;
            padding:10px;
            padding-top:50px;
            text-align: center;
            font-weight: bold;
        }
        #signup_button {
            background-color: #42b72a;
            width: 70px;
            text-align: center;
            padding: 4px;
            border-radius: 4px;
            float: right
        }
        #text{
            border-radius: 4px;
            width:300px;
            height:40px;
            border:solid 1px #ccc;
            padding:4px;
            font-size: 14px;
        }
        #button{
            border-radius: 4px;
            width:300px;
            height:40px;
            font-weight: bold;
            border: none;
            background-color:rgb(59,89,152);
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body style="font-family:tahoma;background-color:#e9ebee;">
    <div id="bar1">
        <div style="font-size:40px">VirtualFriends</div>
        <div id="signup_button">Sign up</div>
    </div>
    <div id="bar2">
        Log in to VirtualFriends<br><br>

<?php

    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>

        <form method="POST" action="/home">
            <input type="email" name="email" id="text" placeholder="Email" aria-label="email"><br><br>
            <input type="password" name="password" id="text" placeholder="Password" aria-label="password"><br><br>
            <input type="submit" name="send" id="button" value="Log in" aria-label="submit">
            <br><br><br>

        </form>
    </div>
</body>
</html>