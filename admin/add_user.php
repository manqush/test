<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>

<?php
if(CheckAdmin()){ 
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
           }
       }
   
    }
   }
}   
   ?>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="bg-white my-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <form action="?action=submit" method="POST">
                        <div class="que mb-3 pb-2 border-bottom">
                        <div class="input-gruop mb-3">
                                <input name="username" id="user" type="text" class="form-control form-control-sm" placeholder="اسم المستخدم">
                            </div>
                            <div class="input-gruop mb-3">
                                <input name="fullname" id="user" type="text" class="form-control form-control-sm" placeholder="الاسم الكامل">
                            </div>
                            <div class="input-gruop mb-3">
                                <input name="email" id="email" type="email" class="text-start form-control form-control-sm" placeholder="البريد الالكتروني">
                            </div>
                            <div class="input-gruop mb-3">
                                <input name="password" id="password" type="password" class="form-control form-control-sm" placeholder="كلمة السر">
                            </div>
                        </div>
                        <?php echo '<div class=\'mb-2\'>'.$messg.'</div>';?>
                        <input class="btn btn-primary" type="submit" value="تسجيل">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
