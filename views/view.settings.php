<?php
     require("layout/header.php");
?>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
    <div style="width:800px;margin:auto;min-height:100px;" >
       
        <h1>Settings</h1>
      
            <div style="min-height:400px;flex:2.5;padding:20px;padding-right:0px">
             
               
                <h2>Create About Page</h2>
                <form method="post" action="/settings">
                    <div class="row">
                        <label>
                            Country
                            <input type="text" name="country"> 
                        </label>            
                    </div>
                    <div class="row">
                        <label>
                            City
                            <input type="text" name="city"> 
                        </label>            
                    </div>
                    
                    <div class="row">
                        <label>
                            Birth Date
                            <input type="date" name="birth_date"> 
                        </label>            
                    </div>
                    <div class="row">
    
                        <label>
                            School
                            <input type="text" name="school"> 
                        </label>
                    </div>
                    <div class="row" >
    
                        <label>
                            University
                            <input type="text" name="university"> 
                        </label>
                    </div>
                    <div class="row" >
    
                        <label>
                            Job
                            <input type="text" name="job"> 
                        </label>
                    </div>
                    
                    <button type="submit" name="send">Submit</button>
                
                </form>  

                
                <h2>insert Photos</h2>
                <form method="Post" enctype="multipart/form-data" action="/photos">
                    <div style="border:solid thin #aaa;padding: 10px;background-color:white">
                        <input type="file" name="photo">
                        <input id="post_button" type="submit" value="Insert" name="insert">
                        <br>
                    </div>
                </form>
            
            </div>
            

         
    </div>
<?php
    require("layout/footer.php");
?>