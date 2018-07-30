<!doctype html>



<html lang="en">
  <head>
    <title>Restaurant</title>
    <meta charset="utf-8">
    <link href="../stylesheet.css" rel="stylesheet" type="text/css">
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
    background-color: #F8F4D8;
    padding: 20px;
}



  </style>
  </head>

  <header>
      <h1>
        <a href="../index.php">
          <img src="../images/lilbits.png" width="100" height="100" alt="" />
        </a>
      </h1>
    </header>


    <navigation>
      <ul style="list-style-type: none;" class="subjects">
        <li><a href="adminmenu.html">Edit Menu</a></li>
        <li><a href="admincontact.php">Edit Contact</a></li>
        <li><a href="adminabout.php">Edit About Us</a></li>
        <li><a href="adminnews.php">Edit News</a></li>
        <li><a href="adminevent.php">Edit Events</a></li>
        <br>
        <li><a href="logout.php" style="color:#e03e52">Logout</a></li>
      </ul>
    </navigation>


<body>
  <div id="content">
        <div class="Admin About">
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
<h4><a href="index.html">&larr; &#32;Back to Admin Center</a></h4>

</body>
</html>
