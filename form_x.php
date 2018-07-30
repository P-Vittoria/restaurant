<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$var_mid = mysqli_real_escape_string($con,$_POST['mid']);
$var_first = mysqli_real_escape_string($con,$_POST['first_name']);
$var_last = mysqli_real_escape_string($con,$_POST['last_name']);
$var_email = mysqli_real_escape_string($con,$_POST['email']);
$var_phone = mysqli_real_escape_string($con,$_POST['phone']);
$var_message = mysqli_real_escape_string($con,$_POST['message']);

$query = "INSERT INTO contactmail(mid, first_name, last_name, email, phone, message)
VALUES ('$var_mid', '$var_first', '$var_last', '$var_email', '$var_phone', '$var_message')";
echo $query;
if (isset($_REQUEST['submitted'])) {

  }
else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
