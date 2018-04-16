<?php

  function find_all_items() {
    global $db;

    $sql = "SELECT * FROM item ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_all_about() {
    global $db;

    $sql = "SELECT * FROM about ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

?>
