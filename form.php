<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$var_user = mysqli_real_escape_string($con,$_POST['username']);
$var_pass = mysqli_real_escape_string($con,$_POST['password']);


//encrypt the password
//Grab the password from form data sent via POST

//encrypt the password
$encPassword = password_hash($var_pass, PASSWORD_DEFAULT); 

$query = "INSERT INTO users(id, username, password)
VALUES ('$var_user', '$encPassword')";



if (mysqli_query($con, $query))
	{echo "User created" . "<br>";}
else
	{ die('SQL Error: ' . mysqli_error($con) ); }
mysqli_close($con);
?>
