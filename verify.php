<?php 
// $encPassword is the hashed password value from our database
// $postPassword is the password from our login form
echo("x"); exit;

$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

//echo("x");exit;

//if(!mysql_select_db($full_db, $con)) { die("Could not get database $full_db: " . mysql_error());  mysql_close($con); }

//echo("x");exit;

//if(!($con = mysql_connect ("localhost", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc"))) { die('Cannot connect to the database because: ' . mysql_error()); }

//if(!mysql_select_db("my+sql=i491u18_vpagliuc", $con)) { die("Could not get database $full_db: " . mysql_error());  mysql_close($con); }

//resource mysql_connect ([ string $server = ini_get("mysql.default_host") [, string $username = ini_get("mysql.default_user") [, string $password = ini_get("mysql.default_password") [, bool $new_link = FALSE [, int $client_flags = 0 ]]]]] )

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$postUsername = mysqli_real_escape_string($con,$_POST['username']);
$postPassword = mysqli_real_escape_string($con,$_POST['password']);

echo("$postUsername","$postPassword"); exit;

$query = "SELECT * FROM users WHERE username='$postUsername'";

  if (password_verify($postPassword, $encPassword )) 
  {     echo 'Password is valid!'; } else {     echo 'Invalid password.'; } 


    else
    	{ die('SQL Error: ' . mysqli_error($con) ); }
    mysqli_close($con); */
?>
