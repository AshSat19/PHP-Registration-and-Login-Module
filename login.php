<!DOCTYPE html>
<!--Specimen Solution for Task 3 By Ashwin Sathian-->

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Ashwin Sathian">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<title>Task 3</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
	</head>

	<body>
		<header id="top" class="container-fluid">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron jumbotron-fluid bg-danger">
							<div class="container">
								<h1 class="text-center text-light">
									USER LOGIN
								</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<?php
			$emailErr = $passErr = "";
			$email = $pass = "";
				
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
                }   
                $email = test_input($_POST["email"]);

				if (empty($_POST["pass"])) {
					$passErr = "Password is required";
                } 	
                $pass = test_input($_POST["pass"]);
			}
				
			function test_input($data) {
			  	$data = trim($data);
			  	$data = stripslashes($data);
			  	$data = htmlspecialchars($data);
			  	return $data;
			}
			?>

            <?php
                require('connect.php');
                require('config.php');

                session_start();
    
                if (isset($_POST['email']) && isset($_POST['pass'])){
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
 
                    $result = mysqli_query($db, "SELECT email, password FROM user WHERE email = '".$email."' AND  password = '".$pass."'");

                    if(mysqli_num_rows($result) > 0 )
                    { 
                        $_SESSION["logged_in"] = true; 
                        $_SESSION["login_user"] = $email;
                        header("location: welcome.php");
                    } else {
                        echo 'The username or password are incorrect!';
                    }
                }
            ?>
			
		<main class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					
					<div class="mx-auto d-block">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
						<?php if(isset($error)){ ?>
                            <div class="alert alert-success" role="alert"> <?php echo $error; ?> </div>
                        <?php } ?>
                        
						<div class="form-group">
							<label for="email">E-mail </label>
							<span class="text-danger font-italic"><?php echo $emailErr;?></span>
							<input type="email" name="email" class="form-control" value="<?php echo $email;?>">
						</div>
						
						<div class="form-group">
							<label for="pass">Password </label>
							<span class="text-danger font-italic"><?php echo $passErr;?></span>
							<input type="password" name="pass" class="form-control" value="<?php echo $pass;?>">
						</div>
						<br>
						<br>
							<input type="submit" class="btn btn-outline-primary mx-auto d-block" name="submit" value="LOGIN">  
						</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			
		</main>
		
		<footer class="container mx-auto d-block">
			<div class="row">
				<div class="col-md-12">
					<br>
					<br>
					<p class="text-center">&copy; Ashwin Sathian</p>
				</div>
			</div>
		</footer>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</body>
</html>