hello
<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");


if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$var_mid = mysqli_real_escape_string($con,$_POST['mid']);
$var_first = mysqli_real_escape_string($con,$_POST['first_name']);
$var_last = mysqli_real_escape_string($con,$_POST['last_name']);
$var_email = mysqli_real_escape_string($con,$_POST['email']);
$var_phone = mysqli_real_escape_string($con,$_POST['phone']);
$var_message = mysqli_real_escape_string($con,$_POST['message']);

$query = "INSERT INTO contactmail(mid, first_name, last_name, email, phone, message)
VALUES ('$var_mid', '$var_first', '$var_last', '$var_email', '$var_phone', '$var_message')";

var_dump($_REQUEST);
if (isset($_REQUEST['submitted'])) {

	echo "submitted";
		/*

// Initialize error array.
  $errors = array();
  // Check for a proper First name
  if (!empty($_REQUEST['first_name'])) {
  $firstname = $_REQUEST['first_name'];
  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
  if (preg_match($pattern,$firstname)){ $firstname = $_REQUEST['first_name'];}
  else{ $errors[] = 'Your Name can only contain _, 1-9, A-Z or a-z 2-20 long.';}
  } else {$errors[] = 'You forgot to enter your First Name.';}
if (mysqli_query($con, $query))
	{echo "Your message has been sent! We'll get back to you ASAP." . "<br>";}

	// Check for a proper Last name
   if (!empty($_REQUEST['last_name'])) {
   $lastname = $_REQUEST['last_name'];
   $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
   if (preg_match($pattern,$lastname)){ $lastname = $_REQUEST['last_name'];}
   else{ $errors[] = 'Your Name can only contain _, 1-9, A-Z or a-z 2-20 long.';}
   } else {$errors[] = 'You forgot to enter your Last Name.';}

   //Check for a valid email
	 if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
		*/

  }
  else
	{
		die('SQL Error: ' . mysql_error($con) );
	}
mysqli_close($con);
?>
