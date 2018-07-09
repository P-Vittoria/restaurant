<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }

$var_text = mysqli_real_escape_string($con,$_POST['about_text']);


$query = "UPDATE about SET about_text='$var_text' WHERE aid='1'";

if (mysqli_query($con, $query))
	{echo "1 record updated " . "<br>";}
Else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
