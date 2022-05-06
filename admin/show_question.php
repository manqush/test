<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="bg-white my-5 bodrder border-secondary p-3 shadow-sm rounded">
                    
                        <?php 
                        if(isset($_GET['id'])){
                            $id=validation($_GET['id']);
                            $num=validation($_GET['num']);
                            
                            ?>
                            <form action="" method="POST">
                            <?php
                            for($i=0;$i<$num;$i++){
                                //show question at form
                                $n=$i+1;
                                $query="SELECT * FROM question WHERE id_que='{$id}' and n={$n}";
                                $data=mysqli_query($connect,$query);
                                while($row=mysqli_fetch_assoc($data)){
                                    $title   = $row['title'];
                                    $option1 = $row['option1'];
                                    $option2 = $row['option2'];
                                    $option3 = $row['option3'];
                                    $option4 = $row['option4'];
                                    $anser   = $row['anser'];
                                }
                         ?>

                        <div class="que mb-3 pb-2 border-bottom">
                            <div class="input-gruop mb-3">
                                <label class='form-label' for="qu">سؤال <?php echo $i+1;?></label>
                                <input disabled name="que[]" id="qu" type="text" class="form-control form-control-sm" placeholder="السؤال" value="<?php echo $title;?>">
                            </div>
                            <div class="container-fluid">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input disabled name="option1[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 1" value="<?php echo $option1;?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input disabled name="option2[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 2" value="<?php echo $option2;?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input disabled name="option3[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 3" value="<?php echo $option3;?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input disabled name="option4[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 4" value="<?php echo $option4;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-gruop mb-3">
                                <label  class='form-label' for="qu">الاختيار الصحيح</label>
                                <input disabled name="ans[]" id="qu" type="number" min="1" max="4" class="form-control form-control-sm" placeholder="0" value="<?php echo $anser;?>">
                            </div>
                        </div>
                        <?php 

                            }
                            }
                            ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
