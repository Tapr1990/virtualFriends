<?php

    require("models/model.posts.php");

    $model = new Posts();

    $posts = $model->Posts();

    $title= "Admin Page - Virtual Friends";

    require("views/admin/adminposts.php");

?>