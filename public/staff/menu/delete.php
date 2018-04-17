<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['iid'])) {
  redirect_to(url_for('/staff/menu/index.php'));
}
$id = $_GET['iid'];

if(is_post_request()) {

  $result = delete_item($id);
  redirect_to(url_for('/staff/menu/index.php'));

} else {
  $item = find_item_by_id($id);
}

?>

<?php $page_title = 'Delete Item'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/menu/index.php'); ?>">&laquo; Back to List</a>

  <div class="item delete">
    <h1>Delete Subject</h1>
    <p>Are you sure you want to delete this subject?</p>
    <p class="item"><?php echo h($item['item_name']); ?></p>

    <form action="<?php echo url_for('/staff/menu/delete.php?id=' . h(u($item['iid']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Item" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
