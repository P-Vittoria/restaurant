<!doctype html>

<html lang="en">
  <head>
    <title>Lil'Bits</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
  </head>
  

  <header>
      <h1>
        <a href="main.html">
          <img src="images/lilbits.png" width="100" height="100" alt="" />
        </a>
      </h1>
    </header>


    <navigation>
      <ul class="subjects">
        <li><a href="menu.html">Menu</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="twitter.html">Twitter</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </navigation>


<body>
  <div id="content">
        <div class="Category listing">
          <h1>Beverages</h1>

          <h4><a href="menu.html">&larr; &#32;Back to Categories</a></h4>
          <br/ >


	<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$sql = "SELECT i.cid, i.iid, i.item_name, i.disc, i.price, i.display FROM item as i WHERE i.cid= '2' and i.display= '1'";
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>Name</th><th>Description</th><th>Price</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["item_name"]."</td><td>".$row["disc"]."</td><td>".$row["price"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>



</div>
</body>


<footer>
  <p>Copyright 2018 Vittoria </p>
  <p>Capstone Makeup</p>
</footer>

</html>
