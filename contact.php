<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");


if (!$con) {
	die("Failed to connect to MySQL: " . mysqli_connect_error() );
}


$form_errors = array();

if (count($_POST) > 0 ) { //Check to see if form has been submitted
  // $var_mid = mysqli_real_escape_string($con,$_POST['mid']);
  $is_form_valid = true;

	if (empty($_POST["first_name"])) {
		$form_errors[] = "You forgot yer name";
    $is_form_valid = false;
	} else {
		//$fname = test_input($_POST["first_name"]);
		//check is name only contains letters and white space
		if (!preg_match("/^[a-zA-Z]*$/",$_POST["first_name"])) {
			$form_errors[] = "Only letters and white space allowed";
      $is_form_valid = false;
		}
	}

	if (empty($_POST["last_name"])) {
		$form_errors[] = "You forgot yer last name";
    $is_form_valid = false;
	} else {
		//$lname = test_input($_POST["last_name"]);
		//check is name only contains letters and white space
		if (!preg_match("/^[a-zA-Z]*$/",$_POST["last_name"])) {
			$form_errors[] = "Only letters and white space allowed";
      $is_form_valid = false;
		}
	}

	if (empty($_POST["email"])) {
		$form_errors[] = "You forgot yer email";
    $is_form_valid = false;
	} else {
		//$email = test_input($_POST["email"]);
		//check is name only contains letters and white space
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$form_errors[] = "Invalid email format";
      $is_form_valid = false;
		}
	}

	if (empty($_POST["phone"])) {
		$form_errors[] = "You forgot yer phone";
    $is_form_valid = false;
	} else {
		//$phone = test_input($_POST["phone"]);
		//check is name only contains letters and white space
		if (!preg_match("/^\d{3}-\d{3}-\d{4}$/i",$_POST["phone"])) {
			$form_errors[] = "Invalid phone number. Format: 000-000-0000";
      $is_form_valid = false;
		}
	}

	if (empty($_POST["message"])) {
		$form_errors[] = "You forgot to write a message";
    $is_form_valid = false;
	}

  if($is_form_valid){
    $var_first = mysqli_real_escape_string($con,$_POST['first_name']);
    $var_last = mysqli_real_escape_string($con,$_POST['last_name']);
    $var_email = mysqli_real_escape_string($con,$_POST['email']);
    $var_phone = mysqli_real_escape_string($con,$_POST['phone']);
    $var_message = mysqli_real_escape_string($con,$_POST['message']);
      $query = "INSERT INTO contactmail(mid, first_name, last_name, email, phone, message)
      VALUES ('$var_mid', '$var_first', '$var_last', '$var_email', '$var_phone', '$var_message')";
      mysqli_query($con,$query);
  }
}

mysqli_close($con);
?>
<!doctype html>


<html lang="en">
  <head>
    <title>Contact</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

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
        <img src="images/lilbits.png" width="100" height="100" alt="" />
      </a>
    </h1>
  </header>

  <navigation>
    <ul style="list-style-type: none;" class="subjects">
      <li><a href="menu.html">Menu</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="twitter.html">Twitter</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="news.php">News</a></li>
      <li><a href="events.php">Events</a></li>
      <br>
      <li><a href="loginuser.php" style="color:#e03e52">Admin Login</a></li>
    </ul>
  </navigation>

  <div class="main-container">
    <center><h1>Contact Us</h1><br>
    <img src="images/bits.jpg" width="400" height="139" alt="number" />
    <br><br><br>
    <br>
    <div> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3093.221235770529!2d-86.53614158506144!3d39.169690979529534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886c66dc13b64b9d%3A0x92447861fa38dd93!2s403+N+Walnut+St%2C+Bloomington%2C+IN+47404!5e0!3m2!1sen!2sus!4v1525039314575" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe> </div>
    <br>
    <form name="contactform" method="post" action="contact.php">
    <table width="450px">
    <tr>
      <td colspan="2">
        <h1> Contact Us... </h1><br>
        <?php
          if(count($_POST)>0){ //Check to see $is_form_valid has been defined(means form has been submitted)
            if(count($form_errors)> 0 ){ // count elements in the error array to make sure its not empty
              echo("<ul class='form-errors'>");
              foreach ($form_errors as  $error) { //loop through error messages
                echo("<li>".$error."</li>"); //show each individual error message
              }
              echo("</ul>");
          } else{
							$_POST=array();//Clear form data after successful post//Show the success message//Show the success message
              echo("<ul class='form-success'>The form has been submitted successfully!</ul>");
            }
          }
        ?>
      </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="first_name">First Name *</label>
     </td>
     <td valign="top">
      <input type="text" name="first_name" maxlength="100" size="30" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="last_name">Last Name *</label>
     </td>
     <td valign="top">
      <input type="text" name="last_name" maxlength="100" size="30" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="email">Email *</label>
     </td>
     <td valign="top">
      <input type="text" name="email" maxlength="100" size="30" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="phone">Phone* </label>
     </td>
     <td valign="top">
      <input type="text" name="phone" maxlength="50" size="30" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="message">Message *</label>
     </td>
     <td valign="top">
      <textarea name="message" maxlength="2000" cols="35" rows="6"><?php if(isset($_POST['message'])) {
           echo htmlentities ($_POST['message']); }?></textarea>
     </td>
    </tr>
    <tr>
     <td colspan="2" style="text-align:center">
      <input type="submit" value="Submit" name="submitted">
     </td>
    </tr>
    </table>
  </form>
</center>

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
