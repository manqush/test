<?php include "includes/header.php"?>
<?php include "includes/nav.php" ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bg-white mt-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>عنوان السؤال</th>
                                <th>عدد الاسئلة</th>
                                <th>العلامات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                         if(getSession('username')){
                            $index=1;
                            $query="SELECT * FROM main_que";
                            $data=mysqli_query($connect,$query);
                            while($row=mysqli_fetch_assoc($data)){
                                echo '<tr>';
                                echo "<td>{$index}</td>";
                                echo "<td>{$row['title']}</td>";
                                echo "<td>{$row['num']}</td>";
                                echo "<td>{$row['mark']}</td>";

                                $username=getSession('username');
                                $id=$row['id'];
                                $tested=false;

                                $query2="SELECT * FROM mark";
                                $data2= mysqli_query($connect,$query2);
                                while($row2=mysqli_fetch_assoc($data2)){
                                    $DB_username= $row2['username'];
                                    $DB_id=$row2['id_que'];
                                    if($DB_username ==$username and $DB_id==$id){
                                    $tested=true;
                                     break;
                                    }
                                }

                                if($tested){
                                    echo "<td>تم الاختبار</td>";
                                }else{
                                echo "<td><a class=' text-decoration-none' href='test.php?action=qus&id={$row['id']}&n=1&t={$row['num']}&m={$row['mark']}'>اختبار</a></td>";

                                }

                                echo '<tr>';
                                $index++;
                            }
                        }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
<?php include "includes/footer.php"?>


