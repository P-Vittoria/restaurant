<!doctype html>

<html lang="en">
  <head>
    <title>Lil'Bits</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
  </head>

  <header>
      <h1>
        <a href="index.php">
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
        <li><a href="news.php">News</a></li>
        <li><a href="events.php">Events</a></li>
      </ul>
    </navigation>


<body>
  <div id="content">
        <div class="Category listing">
          <h1>News Stories</h1>

          <h4><a href="index.html">&larr; &#32;Back to Main</a></h4>
          <br/ >


	<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$sql = "SELECT title, pubdate, content FROM news";
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>Title</th><th>Publish Date</th><th>Content</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["title"]."</td><td>".$row["pubdate"]."</td><td>".$row["content"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>



</div>

<br>
<br>
<br>
<br>

<p>Employees Only!<br>
<a href="adminnews.html">Edit News</a></p>


</body>


<footer>
  <p>Copyright 2018 Vittoria </p>
  <p>Capstone Makeup</p>
</footer>

</html>
