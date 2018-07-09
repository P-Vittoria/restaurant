<!doctype html>

<html lang="en">
  <head>
    <title>Lil'Bits</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
    <style type='text/css'>

    /* Style inputs with type="text", select elements and textareas */
  input[type=text], select, textarea {
    width: 100%; /* Full width */
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
    background-color: #F8F4D8;
    padding: 20px;
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
        <li><a href="contact.html">Contact</a></li>
        <li><a href="twitter.html">Twitter</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="events.php">Events</a></li>
        <br>
        <li><a href="loginuser.php" style="color:#e03e52">Admin Login</a></li>
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
</body>
<footer>
  <p>Copyright &copy; 2018 Vittoria </p>
  <p>Capstone Makeup August 18</p>
</footer>
</html>
