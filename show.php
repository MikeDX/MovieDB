<?php require_once 'app.php'; 

$api = getAPI($_GET['provider'], $config);

$info = json_decode($api->get($_GET['id']));

//print_r($info);
?>

<?php require 'header.php'; ?>
<div class="container">
<p class='h1'><?php echo $info->title ?> (<?php echo $info->year; ?>)</p>
<div class="row justify-content-md-center">
  <div class="col">
  <img src=<?php echo $info->image ?>>
  <p class='description'>
    <?php echo $info->plot; ?>
  </div>
</div>

<?php require 'footer.php'; ?>
