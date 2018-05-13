<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }

$var_cid = $_POST['cid'];
$var_iid = $_POST['iid'];
$var_name = $_POST['item_name'];
$var_disc = $_POST['disc'];
$var_price = $_POST['price'];
$var_display = $_POST['display'];

$query = "UPDATE item SET cid='$var_cid', item_name='$var_name', disc='$var_disc', price='$var_price',
display='$var_display' WHERE iid='$var_iid'";

if (mysqli_query($con, $query))
	{echo "1 record updated" . "<br>";}
Else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
