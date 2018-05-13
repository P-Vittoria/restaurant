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
					<h1>Menu Items</h1>

					<h4><a href="adminmenu.html">&larr; &#32;Back to Admin Editor Menu</a></h4>
					<br/ >

<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


	$sql = "SELECT  i.iid, c.category_name, i.cid, i.item_name, i.disc, i.price, i.display FROM item as i, category as c WHERE c.cid = i.cid";
	$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>Item ID</th><th>Category</th><th>Category ID</th><th>Item Name</th><th>Description</th><th>Price</th><th>Availability</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["iid"]."</td><td>".$row["category_name"]."</td><td>".$row["cid"]."</td><td>".$row["item_name"]."</td><td>".$row["disc"]."</td><td>".$row["price"]."</td><td>".$row["display"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>
