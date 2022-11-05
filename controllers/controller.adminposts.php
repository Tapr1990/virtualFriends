<?php

    require("models/model.posts.php");

    $model = new Posts();

    $posts = $model->Posts();

    if(empty($posts)) {
        http_response_code(404);
    }

    $title= "Admin Page - Virtual Friends";

    require("views/admin/adminposts.php");

?>