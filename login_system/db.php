<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

$conn = new mysqli($severname,$username,$password,$dbname);

if($conn->connect_error)
{
	die("Connection Failed" . $conn->connect_error);
}
?>
