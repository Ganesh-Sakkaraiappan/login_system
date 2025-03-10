<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="styles.css">

</head>
<body>
	<h2>Welcome <?php echo $_SESSION['user_name']; ?>!</h2>
	<p>You are now logged in.</p>
	<a href = "logout.php">Logout</a>
</body>
</html>
