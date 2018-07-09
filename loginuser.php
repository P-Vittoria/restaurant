<!doctype html>


<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
    <style type='text/css'>

      input {
        float: left;
        padding: 3px;
      }

      input[type=text]:focus {
      border: 1px solid;
      }

      form {
        line-height: 2em;
        width: 50%;
        border: 1px;
        background-color: #ffffff;
        padding: 5px 5px 5px 5px;
        border-radius: 5px;
      }

      /* Style inputs with type="text", select elements and textareas */


      /* Style the submit button with a specific background color etc */
      input[type=submit] {
          background-color: #4CAF50;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
      }

      /* Add a background color and some padding around the form */
      table {
          border-radius: 5px;
          background-color: #ffffff;
          padding: 20px;
      }


  </style>
  </head>

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
        <li><a href="contact.html">Contact</a></li>
        <li><a href="twitter.html">Twitter</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="events.php">Events</a></li>
        <br>
        <li><a href="loginuser.php" style="color:#e03e52">Admin Login</a></li>
      </ul>
    </navigation>

<div>
<body>
  <div class="body-content">
    <div class="module">
      <h1>Login Admin</h1>
      <form class="form" action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"></div>
        <input type="text" placeholder="User Name" name="username" required />
        <input type="password" placeholder="Password" name="password" required />
        <div>
        <button type="submit" name="login"> Login</button>
      </form>
    </div>
  </div>

</div>

<br>
<a href="createuser.html">New Admin</a>
<br><br>
</div>

<footer>
  <p>Copyright &copy; 2018 Vittoria </p>
  <p>Capstone Makeup</p>
</footer>



</body>
</html>
