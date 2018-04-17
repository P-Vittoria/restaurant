<?php require_once('../../../private/initialize.php'); ?>

<?php

  $item_set = find_all_items();

?>

<?php $page_title = 'Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Item listing">
    <h1>Menu</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/menu/new.php'); ?>">Create New Item</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Category</th>
        <th>ID</th>
        <th>Item Name</th>
  	    <th>Discription</th>
  	    <th>Price</th>
  	    <th>Availablity</th>
  	  </tr>

      <?php while($item = mysqli_fetch_assoc($item_set)) { ?>
        <tr>
          <td><?php echo h($item['cid']); ?></td>
          <td><?php echo h($item['iid']); ?></td>
          <td><?php echo h($item['item_name']); ?></td>
          <td><?php echo h($item['disc']); ?></td>
    	    <td><?php echo h($item['price']); ?></td>
          <td><?php echo $item['display'] == 1 ? 'available' : 'unavailable'; ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/menu/show.php?id=' . h(u($item['iid']))); ?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($item_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
