<?php include'includes/function.php';?>
<?php include'includes/db.php'?>
<?php 
//login
if(isset($_GET['action']) and $_GET['action']=='login'){
    $username=validation($_POST['loginu']);
    $password=validation($_POST['loginp']);
    $qurey='SELECT * FROM users';
    $data=mysqli_query($connect,$qurey);
    while($row=mysqli_fetch_assoc($data)){
        if($row['username']==$username and password_verify($password,$row['password'])){
            SetSession('username',$username);
            header("Location:account");
            break;
        }
    }

}

//Registrartion
if(isset($_GET['action']) and $_GET['action']=='submit'){
 $username= validation($_POST['username']);
 $fullname=validation($_POST['fullname']);
 $emial=validation($_POST['email']);
 $password=validation($_POST['password']);
 $password=password_hash($password, PASSWORD_DEFAULT);
 $complet= true;
 $messg='';

 if($username =='' || $fullname=='' || $emial=='' || $password==''){
     $messg='يرجى ملاء جميع الحقول';
 }else{
    $qurey='SELECT * FROM users';
    $data=mysqli_query($connect,$qurey);
    while($row=mysqli_fetch_assoc($data)){
        if($row['username']==$username){
            $messg='اسم المستخدم موجود سابقاً';
            $complet=false;
            break;
        }
    }

    if($complet){
        $qurey="INSERT INTO users (username,fullname,email,password) ";
        $qurey.="VALUES('{$username}','{$fullname}','{$emial}','{$password}')";
        $data=mysqli_query($connect,$qurey);
        if($data){
            $messg='تم التسجيل بنجاح';
            SetSession('username',$username);
            header("Location:account");


        }
    }

 }
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exam system</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">


</head>

<body>
    <!-- color of background -->
    <div class="bgFull">
        <header>
            <!-- navbar -->
            <nav class="nav-top navbar navbar-expand-lg navbar-dark bg-danger">
                <div class="container">
                    <a class="navbar-brand text-white" href="#">مدرستي</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav mt-3 mt-lg-0">
                            <li class="nav-item"><a class="p-1 mx-2 text-white nav-link active" aria-current="page" href="#">الرئسية</a></li>
                            <li class="nav-item"><a class="p-1 mx-2 text-white nav-link" href="#">تسجيل طالب جديد</a></li>
                            <li class="nav-item"><a class="p-1 mx-2 text-white nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">دخول</a></li>
                        </div>
                    </div>
                </div>
            </nav>

        </header>

        <!-- Regastr form -->
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="p-3 bg-white border-2 border-secondary shadow-sm">
                        <form action="?action=submit" method="POST">

                            <div class="input-group mb-2">
                                <input  name="username" type="text" class="form-control form-control-sm" placeholder="اسم المستخدم">
                            </div>
                            <div class="input-group mb-2">
                                <input  name="fullname" type="text" class="form-control form-control-sm" placeholder="الاسم الكامل">
                            </div>
                            <div class="input-group mb-2">
                                <input  name="email" type="email" class="text-start form-control form-control-sm" placeholder="البريد الالكتروني">
                            </div>
                            <div class="input-group mb-2">
                                <input  name="password" type="password" class="form-control form-control-sm" placeholder="كلمة السر">
                            </div>
                            <label class="form-label"><?php echo $messg; ?></label>
                            <div class="input-group mb-3 ">
                                <input type="submit" class="btn btn-primary text-center" value="تسجيل">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal of login -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تسجيل الدخول</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="?action=login" method="post">
                        <div class="modal-body">

                            <div class="input-group mb-2">
                                <input class="form-control form-control-sm" type="text" name="loginu" id="" placeholder="اسم المستخدم">
                            </div>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="password" name="loginp" id="" placeholder="كلمة السر">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary" type="submit" value="دخول">

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>