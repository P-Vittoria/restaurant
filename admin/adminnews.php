<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");


if (!$con) {
	die("Failed to connect to MySQL: " . mysqli_connect_error() );
}


$form_errors = array();

if (count($_POST) > 0 ) { //Check to see if form has been submitted
  // $var_mid = mysqli_real_escape_string($con,$_POST['mid']);
  $is_form_valid = true;

	if (empty($_POST["title"])) {
		$form_errors[] = "You forgot to enter a Title";
    $is_form_valid = false;
	}

	if (empty($_POST["pubdate"])) {
		$form_errors[] = "You forgot to enter a Publish Date";
    $is_form_valid = false;
	} else {
		//$fname = test_input($_POST["first_name"]);
		//check is name only contains letters and white space
		if (!preg_match("/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/",$_POST["pubdate"])) {
			$form_errors[] = "Improper syntax. Format: YYYY-MM-DD";
			$is_form_valid = false;
		}
	}

	if (empty($_POST["content"])) {
		$form_errors[] = "You forgot to enter news Content.";
    $is_form_valid = false;
	}

  if($is_form_valid){
		$var_title = mysqli_real_escape_string($con,$_POST['title']);
		$var_pubdate = mysqli_real_escape_string($con,$_POST['pubdate']);
		$var_content = mysqli_real_escape_string($con,$_POST['content']);

		$query = "INSERT INTO news(title, pubdate, content)
		VALUES ('$var_title', '$var_pubdate', '$var_content')";
      mysqli_query($con,$query);
  }
}

mysqli_close($con);
?>
<!doctype html>


<html lang="en">
  <head>
    <title>News</title>
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

textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
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
  <center><h1>Add News</h1></center>
	<br/ >

  <form name="createnews" method="post" action="adminnews.php">
	<table width="450px">
	<tr>
		<td colspan="2">
			<h1> Create News Item... </h1>
			<?php
          if(count($_POST)>0){ //Check to see $is_form_valid has been defined(means form has been submitted)
            if(count($form_errors)> 0 ){ // count elements in the error array to make sure its not empty
              echo("<ul class='form-errors'>");
              foreach ($form_errors as  $error) { //loop through error messages
                echo("<li>".$error."</li>"); //show each individual error message
              }
              echo("</ul>");
          } else{ //Show the success message
              echo("<ul class='form-success'>The News has been added successfully!</ul>");
            }
          }
        ?>
		</td>
	</tr>

	<tr>
	 <td valign="top">
		<label for="title">Title *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="title" maxlength="50" size="30" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="pubdate">Publish Date *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="pubdate" maxlength="50" size="30" value="<?php if (isset($_POST['pubdate'])) echo $_POST['pubdate']; ?>">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="content">Content *</label>
	 </td>
	 <td valign="top">
		<textarea type="textarea" name="content" maxlength="5000" size="30" cols="10" ><?php if(isset($_POST['content'])) {
         echo htmlentities ($_POST['content']); }?></textarea>
	 </td>
	</tr>
	<tr>
	 <td colspan="2" style="text-align:center">
		<input type="submit" value="Submit" name="submitted">
	 </td>
	</tr>

	</table>
	</form>

<br>
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
  <br>
  <br>
  <br>
  <br>

<footer>
  Copyright &copy; 2018 Vittoria Capstone Makeup
</footer>
</div>

</body>
</html>
