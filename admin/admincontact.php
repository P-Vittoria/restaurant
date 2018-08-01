<!doctype html>
<html lang="en">
  <head>
    <title>Contact</title>
    <meta charset="utf-8">
    <link href="../stylesheet.css" rel="stylesheet" type="text/css">
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
        background-color: #138D75;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* When moving the mouse over the submit button, add a darker green color */
    input[type=submit]:hover {
        background-color: #e03e52;
    }

    /* Add a background color and some padding around the form */
    table {
        border-radius: 5px;
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

  .form-errors {
    border: 2px solid #ff0000;
    color: #ff0000;
    padding: 12px 20px;

  }

  </style>
  </head>

<body>
  <header>
    <h1>
      <a href="index.php">
        <img src="../images/lilbits.png" width="100" height="100" alt="" />
      </a>
    </h1>
  </header>

  <navigation>
    <ul style="list-style-type: none;" class="subjects">
      <li><a href="adminmenu.php">Edit Menu</a></li>
      <li><a href="admincontact.php">Messages</a></li>
      <li><a href="adminabout.php">Edit About Us</a></li>
      <li><a href="adminnews.php">Add News</a></li>
      <li><a href="adminevent.php">Add Event</a></li>
      <br>
      <li><a href="logout.php" style="color:#e03e52">Logout</a></li>
    </ul>
  </navigation>

<div class="main-container">
	<center><h1>Contact Message Center</h1></center>
	<br/ >

  <?php
  $con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

  if (!$con)
  	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


  	$sql = "SELECT  mid, first_name, last_name, email, phone, message FROM contactmail";
  	$result = mysqli_query($con, $sql);

  if ($result->num_rows > 0) {
  	echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["mid"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["message"]."</td></tr>";
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
