<?php
$con=mysqli_connect("db.soic.indiana.edu", "i491u18_vpagliuc", "my+sql=i491u18_vpagliuc", "i491u18_vpagliuc");

if (!$con)
{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }


$sql = "SELECT about_text FROM about ";
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
echo "<table><tr><th></th></tr>";
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["about_text"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($con);
?>
