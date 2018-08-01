<!doctype html>

<html lang="en">
  <head>
    <title>Lil'Bits</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
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

<header>
  <h1>
    <a href="index.php">
      <img src="images/lilbits.png" width="100" height="100" alt="" />
    </a>
  </h1>
</header>

<navigation>
  <ul style="list-style-type: none;" class="subjects">
    <li><a href="menu.html">Menu</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="twitter.html">Twitter</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="news.php">News</a></li>
    <li><a href="events.php">Events</a></li>
    <br>
    <li><a href="loginuser.php" style="color:#e03e52">Admin Login</a></li>
  </ul>
</navigation>

<body>
  <div class="main-container">
    <h1><center>Events</h1></center>
    <br/ >

<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$sql = "SELECT title, eventdate, location, description FROM events WHERE display = 1";
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>Title</th><th>Date</th><th>Location</th><th>Descripton</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["title"]."</td><td>".$row["eventdate"]."</td><td>".$row["location"]."</td><td>".$row["description"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>

<br>
<br>
<br>
<br>

<footer>
  <p>Copyright &copy; 2018 Vittoria </p>
  <p>Capstone Makeup</p>
</footer>
</div>

</body>
</html>
