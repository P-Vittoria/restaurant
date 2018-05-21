<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$var_nid = mysqli_real_escape_string($con,$_POST['nid']);
$var_title = mysqli_real_escape_string($con,$_POST['title']);
$var_pubdate = mysqli_real_escape_string($con,$_POST['pubdate']);
$var_content = mysqli_real_escape_string($con,$_POST['content']);

$query = "INSERT INTO news(nid, title, pubdate, content)
VALUES ('$var_nid', '$var_title', '$var_pubdate', '$var_content')";

if (mysqli_query($con, $query))
	{echo "1 record added" . "<br>";}
else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
