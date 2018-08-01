<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
  <link href="stylesheet.css" rel="stylesheet" type="text/css">

</head>
<style>

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
button[type=submit] {
background-color: #138D75;
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

<body>
  <center>
  <div class="main-container">
    <div class="form">
          <h1><font size= "7">Are you sure you belong here?</h1></font>

          <img src="images/morty.jpg" width="600" height="539" alt="pinch" />

          <p><font size= "5"> <?= 'Try not to mess up this time...'; ?></p></font>

          <a href="loginuser.php"><button type="submit" name="submit">Go back</button></a>

    </div>
  </div>
</body>
</html>
