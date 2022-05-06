<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>
<?php 
if(CheckAdmin()){
    if(isset($_GET['edit']) and isset($_GET['edit']) !=null){
        $id=$_GET['edit'];
        $query="SELECT * FROM main_que WHERE id='{$id}'";
        $data=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($data)){
            $title=$row['title'];
            $num=$row['num'];
            $mark=$row['mark'];
        }
    }
}
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="bg-white mt-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <form action="update.php?action=edit_one&id=<?php echo $id; ?>&num=<?php echo $num; ?>" method="POST">
                        <div class="input-gruop mb-3">
                            <label class='form-label' for="titlequ">عنوان الاختبار</label>
                            <input name="title" id="titlequ" type="text" class="form-control form-control-sm" placeholder="عنوان الاختبار" value="<?php echo $title; ?>">
                        </div>

                        <div class="input-gruop mb-3">
                            <label class='form-label' for="mark">مجموع العلامات</label>
                            <input name="mark" id="mark" type="number" min="0" class="form-control form-control-sm" placeholder="0" value="<?php echo $mark; ?>">
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
