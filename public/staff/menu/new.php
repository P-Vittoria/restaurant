<?php

require_once('../../../private/initialize.php');

?>

<?php $page_title = 'Create Item'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/menu/index.php'); ?>">&laquo; Back to List</a>

  <div class="item new">
    <h1>Create Item</h1>

    <form action="<?php echo url_for('/staff/menu/create.php'); ?>" method="post">
      <dl>
        <dt>Category</dt>
        <dd>
          <select name="cid">
            <option value="1">1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Item Name</dt>
        <dd><input type="text" name="item_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Discription</dt>
        <dd><input type="text" name="disc" value="" /></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><input type="text" name="price" value="" /></dd>
      </dl>
      <dl>
        <dt>Availability</dt>
        <dd>
          <input type="hidden" name="display" value="0" />
          <input type="checkbox" name="display" value="1" />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Item" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
