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
          <h1>About Us</h1>
          <br/ >


          <iframe width="560" height="315" src="https://www.youtube.com/embed/NUrZ4ZOO0Hg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


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



</div>
<br>
<br>
<br>
<br>

<p>Employees Only!<br>
<a href="adminabout.php">Edit About</a></p>

</body>


<footer>
  <p>Copyright 2018 Vittoria </p>
  <p>Capstone Makeup August 18</p>
</footer>


</html>
