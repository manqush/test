<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="bg-white mt-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <form action="update.php?action=add_que" method="POST">
                        <div class="input-gruop mb-3">
                            <label class='form-label' for="titlequ">عنوان الاختبار</label>
                            <input name="title" id="titlequ" type="text" class="form-control form-control-sm" placeholder="عنوان الاختبار">
                        </div>
                        <div class="input-gruop mb-3">
                            <label class='form-label' for="nubqu">عدد الاسئلة</label>
                            <input name="num_que" id="nubqu" type="number" min="0" class="form-control form-control-sm" placeholder="0">
                        </div>
                        <div class="input-gruop mb-3">
                            <label class='form-label' for="mark">مجموع العلامات</label>
                            <input name="mark" id="mark" type="number" min="0" class="form-control form-control-sm" placeholder="0">
                        </div>
                        <div class="input-gruop mb-3">
                            <input class="btn btn-primary" type="submit" value="التالي">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
