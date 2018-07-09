<!doctype html>
<html>
<head><meta charset="utf-8">
<link href="../stylesheet.css" rel="stylesheet" type="text/css">
</head>

<title>Lil Bits</title>
<style type='text/css'>

	/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
	width: 40%; /* Full width */
	padding: 12px; /* Some padding */
	border: 1px solid #ccc; /* Gray border */
	border-radius: 4px; /* Rounded borders */
	box-sizing: border-box; /* Make sure that padding and width stays in place */
	margin-top: 6px; /* Add a top margin */
	margin-bottom: 16px; /* Bottom margin */
	resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
	background-color: #4CAF50;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
	background-color: #45a049;
}

/* Add a background color and some padding around the form */
table {
	border-radius: 5px;
	border-color: #000000;
	background-color: #F8F4D8;
	padding: 20px;
}

form {
	width: 65%;
	border-radius: 5px;
	background-color: #ffffff;
	padding: 20px;
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
