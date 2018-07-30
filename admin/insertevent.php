<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$var_eid = mysqli_real_escape_string($con,$_POST['eid']);
$var_title = mysqli_real_escape_string($con,$_POST['title']);
$var_eventdate = mysqli_real_escape_string($con,$_POST['eventdate']);
$var_location = mysqli_real_escape_string($con,$_POST['location']);
$var_descr = mysqli_real_escape_string($con,$_POST['description']);

$query = "INSERT INTO events(eid, title, eventdate, location, description)
VALUES ('$var_eid', '$var_title', '$var_eventdate', '$var_location', '$var_descr')";

if (mysqli_query($con, $query))
	{echo "1 record added" . "<br>";}
else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
