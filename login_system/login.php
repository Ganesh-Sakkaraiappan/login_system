<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	include "db.php";
	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$result = $conn-> query("SELECT * FROM users WHERE email = '$email' ");
		
		if($result -> num_rows >0)
		{
			$user = $result -> fetch_assoc();
			if(password_verify($password,$user['password']))
			{
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['user_name'] = $user['name'];
				header("Location: index.php");
				exit();
			}
			else 
			{
				echo "Invalid email or password!";
			}
		}
		else
		{
			echo "User not found!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="styles.css">

</head>
<body>
	<h2>Login</h2>
	<form method = "post" action = "">
		<input type = "email" name = "email" placeholder = "Email" required><br>
		<input type = "password" name = "password" placeholder = "Password" required><br>
		<button type = "submit">Login</button>
		<br><br>
		<button><a href = 'register.php'>Register</a></button>
	</form>
</body>
</html>
