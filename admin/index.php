<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bg-white mt-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>عنوان الاختبار</th>
                                <th>عدد الاسئلة</th>
                                <th>العلامات</th>
                                <th>عرض</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                          if(CheckAdmin()) {
                            $index=1;
                            $query="SELECT * FROM main_que";
                            $data=mysqli_query($connect,$query);
                            while($row=mysqli_fetch_assoc($data)){
                                echo "<tr>";
                                echo "<td>{$index}</td>";
                                echo "<td>{$row['title']}</td>";
                                echo "<td>{$row['num']}</td>";
                                echo "<td>{$row['mark']}</td>";
                                echo "<td><a class=' text-decoration-none' href='show_question.php?id={$row['id']}&num={$row['num']}'>عرض</a></td>";
                                echo "<td><a class=' text-decoration-none' href='edit_main_question.php?edit={$row['id']}'>تعديل</a></td>";
                                echo "<td><a class=' text-decoration-none' href='?delete={$row['id']}'>حذف</a></td>";
                                echo "</tr>";
                                $index+=1;
                            }

                            //delete question
                            if(isset($_GET['delete'])){
                                $id=$_GET['delete'];
                                $DeleteMain="DELETE FROM main_que WHERE id='{$id}'";
                                $DeleteSubQustion="DELETE FROM question WHERE id_que='{$id}'";
                                $DeleteMark="DELETE FROM mark WHERE id_que='{$id}'";
                                $dataMain=mysqli_query($connect,$DeleteMain);
                                $dataSubQuestion=mysqli_query($connect,$DeleteSubQustion);
                                $dataMark=mysqli_query($connect,$DeleteMark);
                                echo"<script>window.location.href='index.php'</script>";
                            }
                          }
                            
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php" ?>

