<?php include "includes/header.php"?>
<?php 
$_SESSION['username']=null;
destory();
header('Location:index.php');
?>