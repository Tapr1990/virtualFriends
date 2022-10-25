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
<?php
   
        foreach($users as $user) {

            $date[] = $user["date"];
            $user[] = $user["user_id"];
        }

  
?>
            
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ["Element", "Total", { role: "style" } ],
                ["Users",<?php echo $NumberOfUsers; ?> , "#b87333"],
                ["Posts",<?php echo $NumberOfPosts; ?>, "silver"],
                ["Comments",<?php echo $NumberOfComments; ?>, "gold"],
                ["Likes", 5 , "color: #e5e4e2"]
            ]);

            const view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                            { calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation" },
                            2]);

            const options = {
                title: "Total",
                width: 1500,
                height: 800,

                bar: {groupWidth: "50%"},
                legend: { position: "none" },
            };
            const chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);

        }
  </script>
   
   

</head>
<body>

 
    <div id="pgside">
        <h1>VirtualFriends<br>Admin</h1>
        <a href="/admin">Dashboard</a>
        <a href="/adminusers">Users</a>
        <a href="/adminposts">Posts</a>
        <a href="#">Edit Profile</a>
        <a href="/adminlogout">
            <span style="font-size:15px;float:left;margin:10px;color:black;">Logout</span>
        </a>
      
    </div>
    <main id="pgmain">
        <h2>Dashborad</h2>

        <div id="container">
            <div id="total">
                <p>Total Users</p>
                <p><?php echo $NumberOfUsers; ?></p>
            </div>
            <div id="total">
                <p>Total Posts</p>
                <p><?php echo $NumberOfPosts; ?></p>
            </div>
            <div id="total">
                <p>Total Comments</p>
                <p><?php echo $NumberOfComments; ?></p>
            </div>
            <div id="total">
                <p>Total Likes</p>
                <p>5</p>
            </div>
        </div>
        <div id="columnchart_values" style="text-align:center;width: 900px; height: 500px;"></div>



        
      
    </main>
</body>
</html>