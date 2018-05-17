<!doctype html>



<html lang="en">
  <head>
    <title>Restaurant</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
  </head>

  <header>
      <h1>
        <a href="index.html">
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
        <div class="Admin About">
          <h4><a href="about.php">&larr; &#32;Back to Public About Us</a></h4>
          <h4><a href="main.html">&larr; &#32;Back to Main Menu</a></h4>
          <h1> Staff Admin About Editor </h1>
<br/ >


<div id="content">
      <div class="about">

<h3>Current Text: </h3>
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

<h3>Change Current Text to: </h3>
<form action="updateabout.php" method="post">
<br>
<textarea type="textarea" maxlength="50000" cols="100" rows="10" name="about_text"></textarea>
<br>
<button type="submit" name="edititem">Update About Us</button>
</form>

<br>

</body>
</html>
