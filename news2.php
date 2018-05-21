<!doctype html>

<html lang="en">
  <head>
    <title>Lil'Bits</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
  </head>

  <header>
      <h1>
        <a href="index.php">
          <img src="images/lilbits.png" width="100" height="100" alt="" />
        </a>
      </h1>
    </header>


    <navigation>
      <ul class="subjects">
        <li><a href="menu.html">Menu</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="twitter.html">Twitter</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="events.php">Events</a></li>
      </ul>
    </navigation>


<body>
  <div id="content">
        <div class="Category listing">
          <h1>News Stories</h1>

          <h4><a href="index.html">&larr; &#32;Back to Main</a></h4>
          <br/ >


	<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


  per_page=10;
  // Let's put FROM and WHERE parts of the query into variable
  $from_where="FROM Post WHERE active ='1'";
  // and get total number of records
  $sql = "SELECT count(*) ".$from_where;
  $res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
  $row = mysql_fetch_row($res);
  $total_rows = $row[0];

  //let's get page number from the query string
  if (isset($_GET['page'])) $CUR_PAGE = intval($_GET['page']); else $CUR_PAGE=1;
  //and calculate $start variable for the LIMIT clause
  $start = abs(($CUR_PAGE-1)*$per_page);

  //Let's query database for the actual data
  $sql = "SELECT * $from_where ORDER BY PostID DESC LIMIT $start,$per_page";
  $res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
  // and fill an array
  while ($row=mysql_fetch_array($res)) $DATA[++$start]=$row;

  //now let's form new query string without page variable
  $uri = strtok($_SERVER['REQUEST_URI'],"?")."?";
  $tmpget = $_GET;
  unset($tmpget['page']);
  if ($tmpget) {
    $uri .= http_build_query($tmpget)."&";
  }
  //now we're getting total pages number and fill an array of links
  $num_pages=ceil($total_rows/$per_page);
  for($i=1;$i<=$num_pages;$i++) $PAGES[$i]=$uri.'page='.$i;

  //and, finally, starting output in the template.
  ?>
  Found rows: <b><?=$total_rows?></b><br><br>
  <? foreach ($DATA as $i => $row): ?>
  <?=$i?>. <a href="?id=<?=$row['id']?>"><?=$row['title']?></a><br>
  <? endforeach ?>

  <br>
  Pages:
  <? foreach ($PAGES as $i => $link): ?>
  <? if ($i == $CUR_PAGE): ?>
  <b><?=$i?></b>
  <? else: ?>
  <a href="<?=$link?>"><?=$i?></a>
  <? endif ?>
  <? endforeach ?>

<
mysqli_close($con);
?>



</div>
</body>


<footer>
  <p>Copyright 2018 Vittoria </p>
  <p>Capstone Makeup</p>
</footer>

</html>
