<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  // Handle form values sent by new.php
  // Send input to Database
  // Form not submitted to database ?????????!!!!!
  $cid = $_POST['cid'] ?? '';
  $name = $_POST['name'] ?? '';
  $disc = $_POST['disc'] ?? '';
  $price = $_POST['price'] ?? '';
  $display = $_POST['display'] ?? '';

  $result = insert_item($cid, $name, $disc, $price, $display);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('staff/menu/show.php?id=' . $new_id));

} else {


  redirect_to(url_for('/staff/menu/new.php'));
?>
