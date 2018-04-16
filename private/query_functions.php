<?php

  function find_all_items() {
    global $db;

    $sql = "SELECT * FROM item ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

///NOT WORKING _ menu/show.php
  function find_item_by_id($id) {
    global $db;

    $sql = "SELECT * FROM item ";
    //$sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $item; // returns an assoc. array
  }


  function find_all_about() {
    global $db;

    $sql = "SELECT * FROM about ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


///NOT WORKING _ about/show.php
  function find_about_by_id($id) {
    global $db;

    $sql = "SELECT * FROM about ";
    //$sql .= "WHERE id= '" . $id . "';";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $about = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $about; // returns an assoc. array
  }

?>
