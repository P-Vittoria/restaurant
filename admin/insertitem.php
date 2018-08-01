<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");


if (!$con) {
	die("Failed to connect to MySQL: " . mysqli_connect_error() );
}


$form_errors = array();

if (count($_POST) > 0 ) { //Check to see if form has been submitted
  // $var_mid = mysqli_real_escape_string($con,$_POST['mid']);
  $is_form_valid = true;

	if (empty($_POST["cid"])) {
		$form_errors[] = "You forgot to enter a Category ID";
    $is_form_valid = false;
	}

	if (empty($_POST["iid"])) {
		$form_errors[] = "You forgot to enter an Item ID";
    $is_form_valid = false;
	}

	if (empty($_POST["item_name"])) {
		$form_errors[] = "You forgot to enter an Item Name";
    $is_form_valid = false;
	} else {
		//$fname = test_input($_POST["first_name"]);
		//check is name only contains letters and white space
		if (!preg_match("/^[a-zA-Z]*$/",$_POST["item_name"])) {
			$form_errors[] = "Only letters and white space allowed.";
			$is_form_valid = false;
		}
	}

	if (empty($_POST["disc"])) {
		$form_errors[] = "You forgot to enter a Description.";
    $is_form_valid = false;
	}

	if (empty($_POST["price"])) {
		$form_errors[] = "You forgot to enter a Price.";
    $is_form_valid = false;
	} else {
		if (!preg_match("/^[0-9]+(?:\.[0-9]{0,2})?$/",$_POST["price"])) {
			$form_errors[] = "Improper syntax. Proper syntax: 00.00";
			$is_form_valid = false;
		}
	}

	if (empty($_POST["display"])) {
		$form_errors[] = "You forgot to enter if the item is Available.";
    $is_form_valid = false;
	} else {
		//$fname = test_input($_POST["first_name"]);
		//check is name only contains letters and white space
		if (!preg_match("/^[0-1]/",$_POST["display"])) {
			$form_errors[] = "Only numbers allowed are 1 and 0. 0 means No, 1 means Yes.";
			$is_form_valid = false;
		}
	}

  if($is_form_valid){
		$var_cid = mysqli_real_escape_string($con,$_POST['cid']);
		$var_iid = mysqli_real_escape_string($con,$_POST['iid']);
		$var_name = mysqli_real_escape_string($con,$_POST['item_name']);
		$var_disc = mysqli_real_escape_string($con,$_POST['disc']);
		$var_price = mysqli_real_escape_string($con,$_POST['price']);
		$var_display = mysqli_real_escape_string($con,$_POST['display']);

		$query = "INSERT INTO item(cid, iid, item_name, disc, price, display)
		VALUES ('$var_cid', '$var_iid', '$var_name', '$var_disc', '$var_price', '$var_display')";
      mysqli_query($con,$query);
  }
}

mysqli_close($con);
?>
<!doctype html>


<html lang="en">
  <head>
    <title>Insert</title>
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

/* Style the submit button with a specific background color etc */
button[type=submit] {
		background-color: #BBBBBB;
		color: white;
		padding: 12px 20px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
button[type=submit]:hover {
    background-color: #e03e52;
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
	<center><h1>Add New Item</h1></center>
	<br/ >
	<h4><a href="adminmenu.php">&larr; &#32;Back to Menu Editor</a></h4>
	<br/ >

<button type="submit" name="submit" onclick=" window.open('selectitem.php','_blank')">View Items</button>
<button type="submit" name="submit" onclick=" window.open('category.php','_blank')">View Categories</button>
<br><br>

	<form name="insertitem" method="post" action="insertitem.php">
	<table width="450px">
	<tr>
		<td colspan="2">
			<h1> Enter Item Info... </h1><br><br>
			<?php
          if(count($_POST)>0){ //Check to see $is_form_valid has been defined(means form has been submitted)
            if(count($form_errors)> 0 ){ // count elements in the error array to make sure its not empty
              echo("<ul class='form-errors'>");
              foreach ($form_errors as  $error) { //loop through error messages
                echo("<li>".$error."</li>"); //show each individual error message
              }
              echo("</ul>");
          } else{ //Show the success message
              echo("<ul class='form-success'>The item has been added successfully!</ul>");
            }
          }
        ?>
		</td>
	</tr>

	<tr>
	 <td valign="top">
		<label for="cid">Category ID *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="cid" maxlength="50" size="30" value="<?php if (isset($_POST['cid'])) echo $_POST['cid']; ?>">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="iid">Item ID *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="iid" maxlength="50" size="30" value="<?php if (isset($_POST['iid'])) echo $_POST['iid']; ?>">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="item_name">Item Name *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="item_name" maxlength="100" size="30" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="disc">Description *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="disc" maxlength="150" size="30" value="<?php if (isset($_POST['disc'])) echo $_POST['disc']; ?>">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="price">Price *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="price" maxlength="150" size="30" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">
		<span class="error"><?= $name_error ?></span>
	 </td>
	</tr>
	<tr>
	 <td valign="top">
		<label for="display">Available? 1-Y 0-N *</label>
	 </td>
	 <td valign="top">
		<input type="text" name="display" maxlength="150" size="30" value="<?php if (isset($_POST['display'])) echo $_POST['display']; ?>">
	 </td>
	</tr>
	<br><br>
	<tr>
	 <td colspan="2" style="text-align:center">
		<input type="submit" value="Submit" name="submitted">
	 </td>
	</tr>

	</table>
	</form>
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
