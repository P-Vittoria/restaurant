<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0)
{
  echo "You are not logged in.";
  exit;
}



 //admin page

$item = "tiny burgers";

?>


<form method="POST" action="edit_items.php">
 <input type="text" name="item_one" value="<?php echo $item; ?>">
</form>
