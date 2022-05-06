<?php include '../includes/db.php' ?>
<?php include '../includes/function.php' ?>
<?php 
if(CheckAdmin()){

}else{
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <header>