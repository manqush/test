<?php include '../includes/db.php' ?>
<?php include '../includes/function.php' ?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>login</title>
</head>

<body class="bg-light">

    <div class="container h-center">
        <div class="row align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-12 col-md-6">
                <form action="?action=login" method="POST" class="bg-white p-5 shadow-sm border">
                    <input class="form-control form-control-sm mb-2" type="text" name="username" id="" placeholder="اسم المستخدم">
                    <input class="form-control form-control-sm mb-2" type="password" name="password" id="" placeholder="كلمة السر">
                    <input class="btn btn-primary" type="submit" value="تسجيل الدخول">
                </form>
                <?php 
                if(isset($_GET['action']) and $_GET['action']=='login'){
                    $username=validation($_POST['username']);
                    $password=validation($_POST['password']);
                    $query="SELECT * FROM admin";
                    $data=mysqli_query($connect,$query);
                    while($row=mysqli_fetch_assoc($data)){
                        if($username==$row['username'] and $password==$row['password']){
                            session_start();
                            SetSession('admin',$username);
                            header('Location:index.php');
                        }
                    }

                }
                ?>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>