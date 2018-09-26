<?php
   include('session.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
		<meta name="author" content="Ashwin Sathian">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <title>Welcome</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
   
    <body>
        <div class="container">
            <div class="jumbotron jumbotron-fluid">
                <h1 class="text-center">Welcome <i><?php echo $login_session; ?></i></h1> 
                <br><br>
                <button class="btn btn-outline-danger mx-auto d-block"><a href = "logout.php">Log Out</a></button>
            </div>
        </div>
   </body>   
</html>