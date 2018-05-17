<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }

$var_iid = mysqli_real_escape_string($con,$_POST['iid']);

$query = "DELETE FROM item WHERE iid='$var_iid'";


if (mysqli_query($con, $query))
	{echo "1 record deleted" . "<br>";}
Else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
