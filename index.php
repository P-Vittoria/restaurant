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
	<div id="hero-image">
  <img src="images/tiny.png" width="900" height="200" alt="salad" />
</div>

<div id="content">

  <h2>Eat at Lil Bits! </h2>
<br><br>
<h1>Recent News Stories:</h1><br>
  <?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
  {die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$sql = "SELECT title, pubdate, content FROM news LIMIT 3";
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Title</th><th>Publish Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["title"]."</td><td>".$row["pubdate"]."</td><td>".$row["content"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>

  <div id="service-blocks">
    <div class="service">
      <img src="images/outside.png" width="250" height="166" alt="inside of restaurant" />
      <h1>You Hungry?</h1>
      <p>Come on down!</p>
      <p><a href="menu.html" class="learnmore">Tiny menu...</a> </p>
    </div>
  </div>

</div>
</body>


<footer>
  <p>Copyright 2018 Vittoria </p>
  <p>Capstone Makeup</p>
</footer>


</html>
