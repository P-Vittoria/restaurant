<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '1';
//$id = $_GET['aid'] ?? '1'; // PHP > 7.0

$about = find_about_by_id($id);
?>

<?php $page_title = 'Show About'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/about/index.php'); ?>">&laquo; Back to List</a>
  <div class="about show">

  <h1>About Us</h1>

  <div class="attributes">
    <dl>
      <dt>Text:</dt>
        <dd><?php echo h($about['text']); ?></dd>
      </dl>
      </div>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
