<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password =password_hash( $_POST['password'],PASSWORD_DEFAULT);
	
	$check_email = $conn-> query("SELECT * FROM users WHERE email = '$email' ");
	if($check_email -> num_rows > 0)
	{
		echo "Email already registered!";
	}
	else
	{
		$sql = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')";
		if($conn -> query($sql) === TRUE)
		{
			echo "Registration successful! <a href = 'login.php'>Login here</a>";
		}
		else
		{
			echo "Error: " . $conn->error;
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="styles.css">

</head>
<body>
	<h2>Register</h2>
	<form method = "post" action = "">
		<input type = "text" name = "name" placeholder = "Full Name" required><br>
		<input type = "email" name = "email" placeholder = "Email" required><br>
		<input type = "password" name = "password" placeholder = "Password" required><br>
		<button type = "submit">Register</button> 
		<br><br>
		<button><a href = 'login.php'>Login</a></button>
	</form>
</body>
</html>
