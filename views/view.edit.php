<?php
    require("layout/header.php");
?>
    <section>
        <div>
            <form method="post" action="/edit/<?php echo $postid; ?>">
                <textarea name="update" placeholder="Edit post"></textarea>
               
                <button class="post_button" type="submit" name="edit">Edit</button>
            </form>
        </div>
    </section>
<?php
    require("layout/footer.php");
?>