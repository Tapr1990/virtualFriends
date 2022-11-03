<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
        table tr th {
        
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
                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit">
                                Edit
                            </button>
                            <form method="post" action="/adminusers">
                                <input type="hidden" name="userid" value=' .$user["user_id"]. '>
                                <button type="submit" name="delete">delete</button>
                            </form>
                        </td>
                        </tr>
                            
                            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/adminusers">
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
                                                <input type="password" name="password2" id="text" placeholder="Confirme Password">
                                                <input type="hidden" name="userid" value="' .$user["user_id"]. '">
                                                <input type="submit" name="edit" id="button" value="edit">
                                            </form>  
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                            </div>
                ';
                            
                            
                            
            }
?>
                        
                    </table>

                
                  
                    
              
                
  


                    
                    



        </main>
        
    
</body>
</html>