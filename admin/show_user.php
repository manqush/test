<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bg-white my-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>رقم</th>
                                <th>عنوان السؤال</th>
                                <th>عدد الاسئلة</th>
                                <th>علامات السؤال</th>
                                <th>العلامات المحصلة</th>
                                <th>تصفير</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            if(CheckAdmin()){
                                if(isset($_GET['user'])){
                                 $username=$_GET['user'];
                                 $index=1;
                                 $query="SELECT * FROM mark WHERE username='{$username}'";
                                 $data=mysqli_query($connect,$query);
                                 while($row=mysqli_fetch_assoc($data)){
                                     $id=$row['id_que'];
     
                                     echo '<tr>';
                                     echo "<td>{$index}</td>";
     
                                     $query2="SELECT * FROM main_que WHERE id='{$id}'";
                                     $data2=mysqli_query($connect,$query2);
                                     while($row2=mysqli_fetch_assoc($data2)){
                                         echo "<td>{$row2['title']}</td>";
                                         echo "<td>{$row2['num']}</td>";
                                         echo "<td>{$row2['mark']}</td>";
     
                                     }
     
                                     echo "<td>{$row['mark']}</td>";
                                     echo"<td><a class=' text-decoration-none' href='?user={$username}&delete={$id}'>تصفير</a></td>";

                                     echo '</tr>';
                                     $index++;
                                 }
                                }

                                 //rest ques
                                 if(isset($_GET['delete'])){
                                    $username=$_GET['user'];
                                    $id_que=$_GET['delete'];
                                    $query_rest="DELETE FROM mark WHERE username='{$username}' AND id_que='{$id_que}'";
                                    $data_rest=mysqli_query($connect,$query_rest);
                                    header("Location:?user={$username}");

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
