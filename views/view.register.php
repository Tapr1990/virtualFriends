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
        <h2 style="font-size:20px" >Sign in to VirtualFriends</h2>
<?php

    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
    <main>
        <section>
            
            <form method="post" action="/register">
                <div>
                    <input type="text" name="first_name" id="text" placeholder="First Name">

                </div>
                <div>
                    <input type="text" name="last_name" id="text" placeholder="Last Name">

                </div>
                <div>
                    <label>
                        Gender:
                        <select name="gender" id="text">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </label> 
                </div>
                <div>
                    <input type="email" name="email" id="text" placeholder="Email">
                </div>
                <div>
                    <input type="password" name="password" id="text" placeholder="Password">
                </div>
                <div>
                    <input type="password" name="password2" id="text" placeholder="Confirme Password">
                </div>
                <div>
                    <button class="post_button" name="send" type="submit">Register</button>
                </div>

            </form>

                
                
           
        </section>
        
<?php
    require("layout/footer.php");
?>
        
    

