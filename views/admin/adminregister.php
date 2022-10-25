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
            height:540px;
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
        <div style="font-size:40px">Admin - VirtualFriends</div>
        <div id="signup_button">Sign up</div>
    </div>
    <div id="bar2">
        Admin Register - VirtualFriends<br><br>
<?php

    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>


        <form method="POST" action="/registeradmin">
            <input type="text" name="first_name" id="text" placeholder="First Name"><br><br>
            <input type="text" name="last_name" id="text" placeholder="Last Name"><br><br>
            <span style="font-weight: normal;">Gender:</span><br>
            <select name="gender" id="text">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            <br><br>
            <input type="email" name="email" id="text" placeholder="Email"><br><br>
            <input type="password" name="password" id="text" placeholder="Password"><br><br>
            <input type="password" name="password2" id="text" placeholder="Confirme Password"><br><br>
            <input type="submit" name="send" id="button" value="Sign up">
            <br><br><br>
        </form>
    </div>
</body>
</html>
