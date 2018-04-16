<?php require_once('../../../private/initialize.php'); ?>

<?php

  $about_set = find_all_about();

?>

<?php $about_title = 'About Us'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="About Us">
    <h1>About Text</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/about/new.php'); ?>">Create New Page</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Text</th>
  	  </tr>

      <?php while($about = mysqli_fetch_assoc($about_set)) { ?>
        <tr>
          <td><?php echo h($about['aid']); ?></td>
          <td><?php echo h($about['text']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/about/show.php?id=' . h(u($about['aid']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/about/edit.php?id=' . h(u($about['aid']))); ?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php }

      ?>
  	</table>

    <?php mysqli_free_result($about_set); ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>



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
    	    <td><?php echo h($about['text']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/about/show.php?id=' . h(u($about['id']))); ?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($about_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
