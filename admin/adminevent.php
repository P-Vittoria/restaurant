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
		$form_errors[] = "You forgot to enter a Category ID";
    $is_form_valid = false;
	}

  if (empty($_POST["eventdate"])) {
		$form_errors[] = "You forgot to enter an Event Date";
    $is_form_valid = false;
	} else {
		//$fname = test_input($_POST["first_name"]);
		//check is name only contains letters and white space
		if (!preg_match("/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/",$_POST["eventdate"])) {
			$form_errors[] = "Fix Event Date. Improper syntax. Format: YYYY-MM-DD";
			$is_form_valid = false;
		}
	}

  if (empty($_POST["description"])) {
		$form_errors[] = "You forgot to enter a Description";
    $is_form_valid = false;
	}

	if (empty($_POST["display"])) {
		$form_errors[] = "You forgot to enter if the item is Displayed or not.";
    $is_form_valid = false;
	} else {
		//$fname = test_input($_POST["first_name"]);
		//check is name only contains letters and white space
		if (!preg_match("/^[0-1]/",$_POST["display"])) {
			$form_errors[] = "Fix Display. Only numbers allowed are 1 and 0. 0 means No, 1 means Yes.";
			$is_form_valid = false;
		}
	}

  if($is_form_valid){
		$var_title = mysqli_real_escape_string($con,$_POST['title']);
		$var_eventdate = mysqli_real_escape_string($con,$_POST['eventdate']);
		$var_location = mysqli_real_escape_string($con,$_POST['location']);
		$var_disc = mysqli_real_escape_string($con,$_POST['description']);
		$var_display = mysqli_real_escape_string($con,$_POST['display']);

		$query = "INSERT INTO events(title, eventdate, location, description, display)
		VALUES ('$var_title', '$var_eventdate', '$var_location', '$var_disc', '$var_display')";
      mysqli_query($con,$query);
  }
}

mysqli_close($con);
?>
<!doctype html>


<html lang="en">
  <head>
    <title>Event</title>
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
  <center><h1>Add Events</h1></center>

	<form name="adminevent" method="post" action="adminevent.php">
	<table width="450px">
	<tr>
		<td colspan="2">
			<h1> Create New Event... </h1>
			<?php
          if(count($_POST)>0){ //Check to see $is_form_valid has been defined(means form has been submitted)
            if(count($form_errors)> 0 ){ // count elements in the error array to make sure its not empty
              echo("<ul class='form-errors'>");
              foreach ($form_errors as  $error) { //loop through error messages
                echo("<li>".$error."</li>"); //show each individual error message
              }
              echo("</ul>");
          } else{
						  $_POST=array();//Clear form data after successful post
							//Show the success message
              echo("<ul class='form-success'>The item has been added successfully!</ul>");
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
		<label for="eventdate">Event Date *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="eventdate" maxlength="50" size="30" value="<?php if (isset($_POST['eventdate'])) echo $_POST['eventdate']; ?>">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="location">Location *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="location" maxlength="100" size="30" value="<?php if (isset($_POST['location'])) echo $_POST['location']; ?>">
	</tr>
	<tr>
	 <td valign="top">
		<label for="description">Description *</label>
	 </td>
	 <td valign="top">
     <textarea type="textarea" name="description" maxlength="5000" size="30" cols="10"><?php if(isset($_POST['description'])) {
          echo htmlentities ($_POST['description']); }?></textarea>
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="display">Display? 1-Y 0-N *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="display" maxlength="150" size="30" value="<?php if (isset($_POST['display'])) echo $_POST['display']; ?>">
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


$sql = "SELECT title, eventdate, location, description, display FROM events";
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
echo "<table><tr><th>Title</th><th>Date</th><th>Location</th><th>Descripton</th><th>Display</th></tr>";
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["title"]."</td><td>".$row["eventdate"]."</td><td>".$row["location"]."</td><td>".$row["description"]."</td><td>".$row["display"]."</td></tr>";
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
