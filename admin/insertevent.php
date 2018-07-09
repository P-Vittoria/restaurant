<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$var_eid = mysqli_real_escape_string($con,$_POST['eid']);
$var_title = mysqli_real_escape_string($con,$_POST['title']);
$var_eventdate = mysqli_real_escape_string($con,$_POST['eventdate']);
$var_location = mysqli_real_escape_string($con,$_POST['location']);
$var_descr = mysqli_real_escape_string($con,$_POST['description']);

<?php
// define variables and set to empty values
$varErr = $titleErr = $eventdateErr = $location = $var_descr = "";
$var_eid = $var_title = $var_eventdate = $var_location = $var_descr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
?>
$query = "INSERT INTO events(eid, title, eventdate, location, description)
VALUES ('$var_eid', '$var_title', '$var_eventdate', '$var_location', '$var_descr')";

if (mysqli_query($con, $query))
	{echo "1 record added" . "<br>";}
else
	{ die('SQL Error: ' . mysql_error($con) ); }
mysqli_close($con);
?>
