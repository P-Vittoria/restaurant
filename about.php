<!doctype html>

<html lang="en">
  <head>
    <title>Lil'Bits</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
    <style type='text/css'>

    table {
        border-radius: 5px;
        font-size: 20px;
        background-color: #F8F4D8;
        padding: 20px;
        width: 100%;
        line-height: 1.6;
        font-family: Trebuchet MS;
      }

    </style>
  </head>

<body>
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

  <div class="main-container">
    <center><h1> About Us</h1>
    <br/ >
    <iframe width="100%" height="550" src="https://www.youtube.com/embed/NUrZ4ZOO0Hg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

    	<?php
    $con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

    if (!$con)
    	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }

    $sql = "SELECT about_text FROM about ";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
    	echo "<table><tr><th></th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["about_text"]."</td></tr>";
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
</center>
<footer>
  <p>Copyright &copy; 2018 Vittoria </p>
  <p>Capstone Makeup August 18</p>
</footer>
</div>

</body>
</html>
