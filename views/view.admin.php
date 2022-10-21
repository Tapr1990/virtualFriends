<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <title><?php echo $title; ?></title>
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
        <div id="container">
            <div id="total">
                <p>Total Users</p>
                <p>2</p>
            </div>
            <div id="total">
                <p>Total Posts</p>
                <p>3</p>
            </div>
            <div id="total">
                <p>Total Comments</p>
                <p>4</p>
            </div>
            <div id="total">
                <p>Total Likes</p>
                <p>5</p>
            </div>
        </div>

        <div>
            <h3>Users List</h3>
            <table>
                <tr>
                    <th>#NO</th>
                    <th>User</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>#1</td>
                    <td>Cristiano Ronaldo</td>
                    <td>
                        <button>login User</button>
                    </td>
                </tr>
                <tr>
                    <td>#1</td>
                    <td>Cristiano Ronaldo</td>
                    <td>
                        <button>login User</button>
                    </td>
                </tr>
                <tr>
                    <td>#1</td>
                    <td>Cristiano Ronaldo</td>
                    <td>
                        <button>login User</button>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>