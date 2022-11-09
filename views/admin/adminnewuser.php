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
    <main id="pgmain">
        <div>
            <a href="/adminusers">return to users</a>
        </div> 
        <h2>Add New User</h2>
        
        <div>
            <form id="form">
                <input type="text" name="first_name" id="first_name" placeholder="First Name"><br><br>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name"><br><br>
                <span style="font-weight: normal;">Gender:</span><br>
                <select name="gender" id="gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
                <br><br>
                <input type="email" name="email" id="email" placeholder="Email"><br><br>
                <input type="password" name="password" id="password" placeholder="Password"><br><br>
                <input type="password" name="password2" id="password2" placeholder="Confirme Password"><br><br>
                <button id="save">send</button>
                <br><br><br>
            </form>
            <script src="/ajax.js"></script>
        </div>
        
    </main>
</body>
</html>
