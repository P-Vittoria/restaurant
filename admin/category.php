<!doctype html>
<html>
<head><meta charset="utf-8">
<link href="../stylesheet.css" rel="stylesheet" type="text/css">
</head>

<title>Lil Bits</title>
<style type='text/css'>

/* Add a background color and some padding around the form */
table {
	border-radius: 5px;
	border-color: #000000;
	background-color: #F8F4D8;
	padding: 20px;
	font-family: Trebuchet MS;
	font-size: 18px;
	width: 100%;
	line-height: 1.6;
}

	th, td {
	border-bottom: 1px solid #ddd;
	padding: 15px;
	text-align: left;
	height: 50px;
	vertical-align: bottom;
}

</style>
</head>

<body>
	<div id="content">
				<div class="Category listing">
					<h1>Menu Items</h1>

				<br/ >

<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


	$sql = "SELECT  cid, category_name FROM category";
	$result = mysqli_query($con, $sql);

	if ($result->num_rows > 0) {
		echo "<table><tr><th>Category ID</th><th>Category</th></tr>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>".$row["cid"]."</td><td>".$row["category_name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>
