<?php require_once('../../../private/initialize.php'); ?>

<?php
  $abouts = [
    ['id' => '1', 'option' => 'About Text'],
    ['id' => '2', 'option' => 'Secondary Text'],
  ];
?>

<?php $page_title = 'About'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="about">
    <h1>About Me Info</h1>


  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Edit Text</th>

  	  </tr>

      <?php foreach($abouts as $about) { ?>
        <tr>
          <td><?php echo h($about['id']); ?></td>
    	    <td><?php echo h($about['option']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/about/show.php?id=' . h(u($about['id']))); ?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
