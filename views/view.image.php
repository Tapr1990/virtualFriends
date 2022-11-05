<?php
    require("layout/header.php");
?>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
    <div style="width:800px;margin:auto;min-height:400px;" >
       
      
            <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px">
                Edit Image
                <form method="Post" enctype="multipart/form-data" action="/image">
                    <div style="border:solid thin #aaa;padding: 10px;background-color:white">
                        <input type="file" name="image1">
                        <input id="post_button" type="submit" value="Send" name="send">
                        <br>
                    </div>
                </form>

                Edit Background-Image
                <form method="Post" enctype="multipart/form-data" action="/image">
                    <div style="border:solid thin #aaa;padding: 10px;background-color:white">
                        <input type="file" name="image2">
                        <input id="post_button" type="submit" value="Send" name="send">
                        <br>
                    </div>
                </form>
               

        
                
              
                
            </div>

        
    </div>

<?php
    require("layout/footer.php");
?>