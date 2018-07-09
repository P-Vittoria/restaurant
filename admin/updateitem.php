<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }

$var_cid = mysqli_real_escape_string($con,$_POST['cid']);
$var_iid = mysqli_real_escape_string($con,$_POST['iid']);
$var_name = mysqli_real_escape_string($con,$_POST['item_name']);
$var_disc = mysqli_real_escape_string($con,$_POST['disc']);
$var_price = mysqli_real_escape_string($con,$_POST['price']);
$var_display = mysqli_real_escape_string($con,$_POST['display']);

$query = "UPDATE item SET cid='$var_cid', item_name='$var_name', disc='$var_disc', price='$var_price',
display='$var_display' WHERE iid='$var_iid'";

if (mysqli_query($con, $query))
	{echo "1 record updated" . "<br>";}
Else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
