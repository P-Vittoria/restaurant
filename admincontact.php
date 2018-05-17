<!doctype html>
<html>
<head><meta charset="utf-8">
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<title>Lil Bits</title>
<style>
table, th, td {
	border: 2px solid black;
	padding: 10px 10px;
	background-color: #FFEDBC;
	font-family: "Gill Sans";
	font-size: 16px;
}
</style>
</head>
<body>
	<div id="content">
				<div class="Category listing">
					<h1>Contact Message Center</h1>

					<h4><a href="contact.html">&larr; &#32;Back to Contact Us</a></h4>
					<h4><a href="index.html">&larr; &#32;Back to Main</a></h4>
					<br/ >

<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


	$sql = "SELECT  mid, first_name, last_name, email, phone, message FROM contactmail";
	$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["mid"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["message"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>
