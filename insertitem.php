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

$query = "INSERT INTO item(cid, iid, item_name, disc, price, display)
VALUES ('$var_cid', '$var_iid', '$var_name', '$var_disc', '$var_price', '$var_display')";

if (mysqli_query($con, $query))
	{echo "1 record added" . "<br>";}
else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
