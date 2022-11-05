<?php
    require("layout/header_login_register.php");
?>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
        <div class="bar1">
            <div>
                <h1 style="font-size:25px">VirtualFriends</h1>
            </div>
            <div class="signup_button"><a href="/register">Sign up</a></div>
        </div>
    </header>
        <div class="bar2">
        <h2 style="font-size:20px" >Log in to VirtualFriends</h2>
<?php

    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
    <main>
        <section>
            <form method="POST" action="/home">
                <div>
                    <input type="email" name="email" id="text" placeholder="Email" aria-label="email">
                </div>
                <div>
                    <input type="password" name="password" id="text" placeholder="Password" aria-label="password">

                </div>
                <div>
                    <input type="submit" name="send" id="button" value="Log in" aria-label="submit">

                </div>
            </form>
        </section>
<?php
    require("layout/footer.php");
?>