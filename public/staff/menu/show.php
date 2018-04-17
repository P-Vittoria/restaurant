<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = isset($_GET['iid']) ? $_GET['iid'] : '1';
//$id = $_GET['iid'] ?? '1'; // PHP > 7.0

$item = find_item_by_id($id);
?>

<?php $page_title = 'Show Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/menu/index.php'); ?>">&laquo; Back to List</a>

  <div class="item show">

    <h1>Item: <?php echo h($item['item_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Category</dt>
        <dd><?php echo h($item['cid']); ?></dd>
      </dl>
      <dl>
        <dt>Item Name</dt>
        <dd><?php echo h($item['item_name']); ?></dd>
      </dl>
      <dl>
        <dt>Discription</dt>
        <dd><?php echo h($item['disc']); ?></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><?php echo h($item['price']); ?></dd>
      </dl>
      <dl>
        <dt>Availablity</dt>
        <dd><?php echo $item['display'] == '1' ? 'available' : 'unavailable'; ?></dd>
      </dl>
    </div>

  </div>

</div>
