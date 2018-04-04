<?php require_once('../../../private/initialize.php'); ?>

<?php
  $items = [
    ['id' => '1', 'category' => '1', 'availability' => '1', 'price' => '3', 'discription' => 'Yummy', 'item_name' => 'Panini'],
    ['id' => '2', 'category' => '2', 'availability' => '1', 'price' => '4', 'discription' => 'Yummy', 'item_name' => 'Brisket'],
    ['id' => '3', 'category' => '3', 'availability' => '1', 'price' => '6', 'discription' => 'Yummy', 'item_name' => 'Caeser Salad'],
    ['id' => '4', 'category' => '4', 'availability' => '1', 'price' => '8', 'discription' => 'Yummy', 'item_name' => 'Salmon'],
  ];
?>

<?php $page_title = 'Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Item listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="">Create New Item</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Availability</th>
  	    <th>Price</th>
  	    <th>Discription</th>
  	    <th>Item Name</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php foreach($items as $item) { ?>
        <tr>
          <td><?php echo h($item['id']); ?></td>
          <td><?php echo h($item['category']); ?></td>
          <td><?php echo $item['availability'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($item['price']); ?></td>
          <td><?php echo h($item['discription']); ?></td>
          <td><?php echo h($item['item_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/menu/show.php?id=' . h(u($item['id']))); ?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
