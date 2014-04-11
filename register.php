<?php
	require 'core/init.php';

	//if form is submitted
	if(isset($_POST['submit'])){
		if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
			$errors[] = 'All fields are required.';
		}else{
			if ($people->user_exists($_POST['username']) === true){
				$errors[] = 'That username already exists';
			}
			if(!ctype_alnum($_POST['username'])){
				$errors[]='Please enter a username with only alphabets and numbers';
			}
			if(strlen($_POST['password']) < 6){
				$errors[] = 'Your password must be at least 6 characters';
			}else if(strlen($_POST['password']) > 18) {
				$errors[] = 'Your password cannot be more than 18 characters long';
			}
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'Please enter a valid email address';
			}else if($people->email_exists($_POST['email']) === true){
				$errors[] = 'That email already exists.'
			}
		}

		if(empty($errors) === true){
			$username = htmlentities($_POST['username']);
			$password = $_POST['password'];
			$email = htmlentities($_POST['email']);

			$people->register($username,$password,$email); //register function call
			header('Location: register.php?success');
			exit();
		}
	}

	if (isset($_GET['success']) && empty($_GET['success'])) {
		echo 'Thank you for registering. Please check your email.'
	}
?>
<!doctype html>
<html>
	<head>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
			<form method="post" action="">
				<h4>Username</h4>
				<input type="text" name="username" />
				<h4>Password</h4>
				<input type="password" name="password" />
				<h4>Email</h4>
				<input type="text" name="email" />
				<br />
				<input type="submit" name="submit" />
			</form>
			<?php 
				//display errors
				if(empty($errors) === false){
					echo '<p>' . implode('</p><p>', $errors) . '</p>';
				}
			?>
		</div>
	</body>
</html>