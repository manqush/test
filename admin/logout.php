<?php include '../includes/db.php' ?>
<?php include '../includes/function.php' ?>
<?php 
destory();
removeSesstion('admin');
header('Location:index.php');
?>