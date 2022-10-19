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
        h2{
           text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 5px 10px;
        }

        .row {
            margin: 5px 10px;
        }

        .row label {
            text-align: left;
        }

        .row input {
            width: 150px;
            margin-left: 10px;
            text-align: ri
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
       
        <h1>Settings</h1>
      
            <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px">
                <!--<h2>Edit User Data</h2>
                <form method="post" action="/settings">
                    <div class="row">
    
                        <label>
                            Frist Name
                            <input type="text" name="first_name"> 
                        </label>
                    </div>
                    <div class="row">
    
                        <label>
                            Last Name
                            <input type="text" name="last_name"> 
                        </label>
                    </div>
                    <div class="row">
    
                        <label>
                            Email
                            <input type="email" name="email"> 
                        </label>
                    </div>
                    <div class="row">
    
                        <label class="row">
                            New Password
                            <input type="password" name="newpassword1"> 
                        </label>            
                    </div>
                    <div class="row">
    
                        <label class="row">
                            Repeat New Password
                            <input type="password" name="newpassword2"> 
                        </label>            
                    </div>

                    <button type="submit" name="send">Submit</button>
                
                </form>-->  
               
                <h2>Create About Page</h2>
                <form method="post" action="/settings">
                    <div class="row">
                        <label>
                            Country
                            <input type="text" name="country"> 
                        </label>            
                    </div>
                    <div class="row">
                        <label>
                            City
                            <input type="text" name="city"> 
                        </label>            
                    </div>
                    
                    <div class="row">
                        <label>
                            Birth Date
                            <input type="date" name="birth_date"> 
                        </label>            
                    </div>
                    <div class="row">
    
                        <label>
                            School
                            <input type="text" name="school"> 
                        </label>
                    </div>
                    <div class="row" >
    
                        <label>
                            University
                            <input type="text" name="university"> 
                        </label>
                    </div>
                    <div class="row" >
    
                        <label>
                            Job
                            <input type="text" name="job"> 
                        </label>
                    </div>
                    
                    <button type="submit" name="send">Submit</button>
                
                </form>  

                
                <h2>insert Photos</h2>
                <form method="Post" enctype="multipart/form-data" action="/photos">
                    <div style="border:solid thin #aaa;padding: 10px;background-color:white">
                        <input type="file" name="photo">
                        <input id="post_button" type="submit" value="Insert" name="insert">
                        <br>
                    </div>
                </form>
            
            </div>
            

         
    </div>