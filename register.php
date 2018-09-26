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
						<div class="jumbotron jumbotron-fluid bg-warning">
							<div class="container">
								<h1 class="text-center">
									NEW USER REGISTRATION
								</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<?php
			$nameErr = $emailErr = $passErr = $cpassErr = "";
			$name = $email = $pass = $cpass = "";
				
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["name"])) {
					$nameErr = "Name is required";
				} else {
					$name = test_input($_POST["name"]);
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
						$nameErr = "Only letters and white space allowed"; 
					}
				}
				  
				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
				} else {
					$email = test_input($_POST["email"]);
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					  	$emailErr = "Invalid email format"; 
					}
				}

				if (empty($_POST["pass"])) {
					$passErr = "Password is required";
				} else {
					$pass = test_input($_POST["pass"]);
				}

				if (empty($_POST["cpass"])) {
					$cpassErr = "Re-enter Password";
				} else {
					$cpass = test_input($_POST["cpass"]);
					if ($cpass != $pass) {
					  	$cpassErr = "Passwords do not match"; 
					}
				}
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
    
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])) {
                    $name = $_POST['name'];
	                $email = $_POST['email'];
                    $pass = $_POST['pass'];
 
                    $query = "INSERT INTO `user` (username, password, email, active) VALUES ('$name', '$pass', '$email', 'Yes')";
                    $result = mysqli_query($connection, $query);
                
                    if($result){
                        $smsg = "User Created Successfully.";
                    } else {
                        $fmsg ="User Registration Failed";
                    }
                }
            ?>
			
		<main class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<p class="text-center text-danger font-italic"><span class="error">* required field</span></p>
					
					<div class="mx-auto d-block">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
						<?php if(isset($smsg)){ ?>
                            <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
                        <?php } ?>
                        <?php if(isset($fmsg)){ ?>
                            <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div>
                        <?php } ?>

                        <div class="form-group">  
							<label for="name">Name </label>
							<span class="text-danger font-italic">* <?php echo $nameErr;?></span>
							<input type="text" name="name" class="form-control" value="<?php echo $name;?>">
						</div>
						
						<div class="form-group">
							<label for="email">E-mail </label>
							<span class="text-danger font-italic">* <?php echo $emailErr;?></span>
							<input type="email" name="email" class="form-control" value="<?php echo $email;?>">
						</div>
						
						<div class="form-group">
							<label for="pass">Password </label>
							<span class="text-danger font-italic">* <?php echo $passErr;?></span>
							<input type="password" name="pass" class="form-control" value="<?php echo $pass;?>">
						</div>
						
						<div class="form-group">
							<label for="cpass">Confirm Password </label>
							<span class="text-danger font-italic">* <?php echo $cpassErr;?></span>
							<input type="password" name="cpass" class="form-control" value="<?php echo $cpass;?>">
						</div>
						<br>
						<br>
							<input type="submit" class="btn btn-outline-primary mx-auto d-block" name="submit" value="REGISTER">  
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