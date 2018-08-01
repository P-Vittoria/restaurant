<?php
session_start();

$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }

  $post_user = mysqli_real_escape_string($con,$_POST['username']);
  $post_pass = mysqli_real_escape_string($con,$_POST['password']);

$query = "SELECT * FROM users WHERE username='$post_user';";
//echo ("$query."); exit;
//if(!($result = mysql_query ($query, $con))) { die('Could not get user data (users): ' . mysql_error());  mysql_close($con); }
$result = $con->query($query); //= mysqli_query ($query, $con);
//echo ("$result.."); exit;

$user_row = $result->fetch_assoc(); //mysqli_fetch_assoc($result, MYSQLI_NUM);

$userId = $user_row['id'];
$dbPass = $user_row['password'];
$name = $user_row['username'];
$encPassword = hash(md5,hash(whirlpool, $post_pass));

if ($dbPass != $encPassword) {
  header("Location: bad.php");
}
else {
  $_SESSION['user_id'] = $userId;
	header("Location: admin/index.php");
}

/*if (password_verify($post_user, $post_pass)) 
{     echo 'Password is valid!'; } else {     echo 'Invalid password.'; } 


  else
    { die('SQL Error: ' . mysqli_error($con) ); }
  mysqli_close($con);

*/


 ?>
