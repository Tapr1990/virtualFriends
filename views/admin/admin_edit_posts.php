<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div>
            <div>
                <a href="/adminposts">return to users</a>
            </div> 
            <h3>Edit Post</h3>
                <form method="POST" action="/admin_edit_posts/<?php echo $postid; ?>">
                    <textarea name="update" placeholder="Edit post"></textarea>
                   
                    <button class="post_button" type="submit" name="edit2">Edit</button>
                </form>
        </div>
</body>
</html>