<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['aid'])) {
  redirect_to(url_for('/staff/about/index.php'));
}
$id = $_GET['aid'];
$text = 'text';


if(is_post_request()) {

  // Handle form values sent by new.php

  $text = $_POST['text'] ?? '';

  echo "Form parameters<br />";
  echo "Text: " . $text . "<br />";
}

?>

<?php $page_title = 'Edit Text'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/about/index.php'); ?>">&laquo; Back to List</a>

  <div class="item edit">
    <h1>Edit Text</h1>

    <form action="<?php echo url_for('/staff/about/edit.php?id=' . h(u($id))); ?>" method="post">

      <dl>
        <dt>Text:</dt>
        <dd><input type="text" name="text" value="<?php echo h($text); ?>" /></dd>
      </dl>
      
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
