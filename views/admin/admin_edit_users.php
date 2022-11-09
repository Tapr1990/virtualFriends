<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="edit">
            <div>
                <a href="/adminusers">return to users</a>
            </div> 
            <h3>Edit User</h3>
                <form method="POST" action="/admin_edit_users/<?php echo $userid; ?>">
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
                    
                    <input type="submit" name="edit" id="button" value="edit">
                    <br><br><br>
                </form>
        </div>
</body>
</html>