<!doctype html>

<html lang="en">
  <head>
    <title>Lil'Bits</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
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
	<div id="hero-image">
  <img src="images/tiny.png" width="900" height="200" alt="salad" />
</div>

<div id="content">

  <img src="images/bits.jpg" width="400" height="139" alt="number" />
  <br>
  <div id="service-blocks">
    <div class="service">
      <img src="images/outside.png" width="250" height="166" alt="inside of restaurant" />
      <h1>You Hungry?</h1>
      <p>Come on down!</p>
      <p><a href="menu.html" class="learnmore">Tiny menu...</a> </p>
    </div>
  </div>

  <div id="service-blocks">
    <div class="service">
      <img src="images/party.jpg" width="250" height="166" alt="inside of restaurant" />
      <h1>Lots goin on!</h1>
      <p>Check it out</p>
      <p><a href="menu.html" class="learnmore">Lil' Bits Events...</a> </p>
    </div>
  </div>

  <div id="service-blocks">
    <div class="service">
      <img src="images/stall.jpg" width="250" height="166" alt="inside of restaurant" />
      <h1>Have you heard?</h1>
      <p>Lil' Bits in the News</p>
      <p><a href="menu.html" class="learnmore">Breaking stories...</a> </p>
    </div>
  </div>
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

<br><br>

</div>
</body>


<footer>
  <p>Copyright &copy; 2018 Vittoria </p>
  <p>Capstone Makeup</p>
</footer>


</html>
