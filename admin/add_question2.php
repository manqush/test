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
                            <form action="update.php?action=add_que2&id=<?php echo $id;?>&num=<?php echo $num;?>" method="POST">
                            <?php
                            for($i=0;$i<$num;$i++){
                         ?>

                        <div class="que mb-3 pb-2 border-bottom">
                            <div class="input-gruop mb-3">
                                <label class='form-label' for="qu">سؤال <?php echo $i+1;?></label>
                                <input name="que[]" id="qu" type="text" class="form-control form-control-sm" placeholder="السؤال">
                            </div>
                            <div class="container-fluid">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input name="option1[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input name="option2[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 2">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input name="option3[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 3">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-gruop mb-3">
                                            <input name="option4[]" id="option1" type="text" class="form-control form-control-sm" placeholder="اختيار 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-gruop mb-3">
                                <label class='form-label' for="qu">الاختيار الصحيح</label>
                                <input name="ans[]" id="qu" type="number" min="1" max="4" class="form-control form-control-sm" placeholder="0">
                            </div>
                        </div>
                        <?php 

                            }
                            }
                            ?>

                        <input class="btn btn-primary" type="submit" value="تكوين">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
