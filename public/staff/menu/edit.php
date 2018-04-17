<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['iid'])) {
  redirect_to(url_for('/staff/menu/index.php'));
}
$id = $_GET['iid'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $item =[];
  $item['iid'] = $id;
  $item['cid'] = $_POST['cid'] ?? '';
  $item['item_name'] = $_POST['item_name'] ?? '';
  $item['disc'] = $_POST['disc'] ?? '';
  $item['price'] = $_POST['price'] ?? '';
  $item['display'] = $_POST['display'] ?? '';

  $result = update_item($item);
  redirect_to(url_for('/staff/menu/show.php?id=' . $id));


} else {

  $item = find_item_by_id($id);

  $item_set = find_all_subjects();
  $item_count = mysqli_num_rows($item_set);
  mysqli_free_result($item_set);

}

?>

<?php $page_title = 'Edit Item'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/menu/index.php'); ?>">&laquo; Back to List</a>

  <div class="item edit">
    <h1>Edit Item</h1>

    <form action="<?php echo url_for('/staff/menu/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Category</dt>
        <dd>
          <select name="cid">
            <option value="1"<?php if($item['cid'] == "1") { echo " selected"; } ?>>1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Item Name</dt>
        <dd><input type="text" name="item_name" value="<?php echo h($item['item_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Discription</dt>
        <dd><input type="text" name="disc" value="<?php echo h($item['disc']); ?>" /></dd>
      </dl>
      <dl>
        <dl>
          <dt>Price</dt>
          <dd><input type="text" name="price" value="<?php echo h($item['price']); ?>" /></dd>
        </dl>
        <dl>
      <dl>
        <dt>Availablity</dt>
        <dd>
          <input type="hidden" name="visible" value="Unavailable" />
          <input type="checkbox" name="visible" value="Available"<?php if($item['display'] == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Item" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
