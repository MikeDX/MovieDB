<?php require_once('app.php'); 

$api = getAPI($_GET['provider'],$config);

$info = json_decode($api->get($_GET['id']));

//print_r($info);
?>

<?php include('header.php'); ?>
<div class="container">
<p class='h1'><?=$info->title ?></p>
<div class="row justify-content-md-center">
  <div class="col">
  <img src=<?=$info->image ?>>
  <p class='description'>
  <?=$info->plot; ?>
  </div>
</div>

<?php include('footer.php'); ?>
