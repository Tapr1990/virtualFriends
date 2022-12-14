<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<style>
        * {
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        h1 {
            font-size: 20px;
        }

        #pgside, #pgmain { padding: 10px;}

        #pgside {
            width: 150px;
            background: #f2f2f2;
            
        }

        #pgmain {
            flex-grow: 1;
        }

        #pgside a {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 50px
        }
        #container {
            display: flex;
            justify-content: space-around;
        }
        #total {
            width: 150px;
            height: 80px;
            background-color: blue;
            border-radius: 10px;
        }
        #total p {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table, tr, th {
            width: 600px;
            text-align: center;
        }
     
        

      
            
    </style>

</head>
<body>
    
    
    
    <div id="pgside">
            <h1>VirtualFriends<br>Admin</h1>
            <a href="/admin">Dashboard</a>
            <a href="/adminusers">Users</a>
            <a href="/adminposts">Posts</a>
            <a href="#">Edit Profile</a>
            <a href="/adminlogout">
                <span style="font-size:15px;float:left;margin:10px;color:black;">Logout</span>
            </a>
            
        </div>
        <main id="pgmain">
            <h2>Dashborad</h2>
            
            <h3>Users</h3>
            <button><a href="/adminnewuser">Add New User</a></button>
           

                <table>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                       
<?php
                foreach($users as $user) {
                    echo '
                        <tr>
                        <td>' .$user["user_id"]. '</td>
                        <td>' .esc($user["username"]). '</td>
                            <td>' .$user["email"]. '</td>
                            <td>' .$user["gender"]. '</td>
                            <td>' .date("jS M, Y", strtotime($user["date"])). '</td>
                            <td>
                                <button><a href="/admin_edit_users/' .$user["user_id"]. '">Edit</a></button>
    
                                <form method="post" action="/adminusers">
                                    <input type="hidden" name="userid" value=' .$user["user_id"]. '>
                                    <button type="submit" name="delete">delete</button>
                                </form>
                            </td>
                            </tr>
                                
                            
                            
                            
                            ';
                            
                            
                            
                        }
?>
                </table>
                            
         
        </main>
</body>
</html>

                
                  
                    
              
                
  


                    
                    



        
    