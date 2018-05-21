<?php 
// $encPassword is the hashed password value from our database
// $postPassword is the password from our login form

$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }

$username = mysqli_real_escape_string($con,$_POST['username']);
$postPassword = mysqli_real_escape_string($con,$_POST['password']);

$sql_script = 'select * from USERS where username="'.$username.'"';


	if($username == 'username'
  && password_verify($postPassword, $encPassword )) 
    
	{
	        include("adminmenu.html");
	}
	else
	{
	    echo 'Invalid password.'; }

    else
    	{ die('SQL Error: ' . mysqli_error($con) ); }
    mysqli_close($con);
?>
