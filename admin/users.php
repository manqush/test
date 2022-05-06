<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">حذف مستخدم</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        هل انت متاكد من حذف المستخدم؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
        <a href="" class="delete-link btn btn-primary">حذف</a>
      </div>
    </div>
  </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bg-white my-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>اسم المستخدم</th>
                                <th>الاسم الكامل</th>
                                <th>عدد الاختبارات المنجزة</th>
                                <th>مجموع العلامات</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                           if(CheckAdmin()){ 
                             $index=1;
                             $qurey="SELECT * FROM users";
                             $data=mysqli_query($connect,$qurey);
                             while($row=mysqli_fetch_assoc($data)){
                                 echo'<tr>';
                                 echo"<td>{$index}</td>";
                                 echo"<td>{$row['username']}</td>";
                                 echo"<td>{$row['fullname']}</td>";


                                
                                 //get mark
                                 $mark=0;
                                 $que=0;
                                 $qurey2="SELECT * FROM mark WHERE username='{$row['username']}'";
                                 $data2=mysqli_query($connect,$qurey2);
                                 while($row2=mysqli_fetch_assoc($data2)){
                                  $mark+=$row2['mark'];
                                  //get question number
                                  $que++;
                                 }
                                 echo"<td>{$que}</td>";
                                 echo"<td>{$mark}</td>";
                                 if($que!=0){
                                 echo"<td><a class=' text-decoration-none' href='show_user.php?user={$row['username']}'>عرض</a></td>";
                                 }else{
                                 echo"<td>عرض</td>";
                                 }
                                 echo"<td><a class='link-click text-decoration-none' uaer='{$row['username']}'  data-bs-toggle='modal' data-bs-target='#delete' href=''>حذف</a></td>";
                                 echo'</tr>';
                                $index++;
                             }

                             if(isset($_GET['delete'])){
                                 //delete username and mark
                                 $UsDelete=$_GET['delete'];
                                 $qurey_delete="DELETE FROM users WHERE username='{$UsDelete}'";
                                 $dataDelete=mysqli_query($connect,$qurey_delete);
                                 $quDeleteMark="DELETE FROM mark WHERE username='{$UsDelete}'";
                                 $dataDelete=mysqli_query($connect,$quDeleteMark);
                                 echo"<script>window.location.href='users.php';</script>";

                             }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        let link_click=document.querySelectorAll('.link-click');
            for(i=0;i<link_click.length;i++){
                link_click[i].addEventListener('click',function(el){
                    let username=this.getAttribute('uaer');
                    let link='?delete='+username;
                    let linkDelete=document.querySelector('.delete-link');
                    linkDelete.setAttribute('href',link);
                });
            }




    </script>
    <?php include "includes/footer.php" ?>
