<?php

  function find_all_items() {
    global $db;

    $sql = "SELECT * FROM item ORDER BY (cid) ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  //$sql = "SELECT i.iid, c.category_name, i.item_name, i.disc, i.price, i.display
  //FROM category as c, item as i
  //WHERE c.cid = i.iid ORDER BY i.item_name" ;

///NOT WORKING _ menu/show.php

function find_all_cat() {
  global $db;

  $sql = "SELECT * FROM category ";
  //$sql .= "ORDER BY position ASC";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

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

  function insert_item($cid, $name, $disc, $price, $display) {
    global $db;

    $sql = "INSERT INTO item ";
    $sql .= "(cid, name, disc, price, display) ";
    $sql .= "VALUES (";
    $sql .= "'" . $item['cid'] . "',";
    $sql .= "'" . $item['name'] . "',";
    $sql .= "'" . $item['disc'] . "',";
    $sql .= "'" . $item['price'] . "',";
    $sql .= "'" . $item['display'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

///NOT WORKING _ about/create.php ???????????!!!!!!!!!!!!!
  function update_item($item) {
    $sql = "UPDATE item SET ";
    $sql .= "cid='" . $item['cid'] . "', ";
    $sql .= "name='" . $item['name'] . "', ";
    $sql .= "disc='" . $item['disc'] . "', ";
    $sql .= "price='" . $item['price'] . "', ";
    $sql .= "display='" . $item['display'] . "' ";
    $sql .= "WHERE id='" . $item['iid'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // for update staements the result is t/f
    if($result) {
      redirect_to(url_for('/staff/subjects/show.php?id=' . $id));

    } else {
      //UPDATE FAILED
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

///NOT WORKING _ about/delete.php ???????????!!!!!!!!!!!!!
  function delete_item($id) {
   global $db;

   $sql = "DELETE FROM item ";
   $sql .= "WHERE id='" . $id . "' ";
   $sql .= "LIMIT 1";
   $result = mysqli_query($db, $sql);

   // For DELETE statements, $result is true/false
   if($result) {
     return true;
   } else {
     // DELETE failed
     echo mysqli_error($db);
     db_disconnect($db);
     exit;
   }
 }

  function find_all_about() {
    global $db;

    $sql = "SELECT * FROM about ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


///NOT WORKING _ about/show.php ???????????!!!!!!!!!!!!!
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
