<?php include "includes/header.php"?>
<?php include "includes/nav.php" ?>
<?php 
if(getSession('username')){
if(isset($_GET['action']) and $_GET['action']=='qus'){
$id=$_GET['id'];
$num=$_GET['n'];
$totle=$_GET['t'];
$mark=$_GET['m'];

$query="SELECT * FROM question WHERE id_que='{$id}' and n={$num}";
$data=mysqli_query($connect,$query);
    while($row=mysqli_fetch_assoc($data)){
        $title= $row['title'];
        $option1= $row['option1'];
        $option2= $row['option2'];
        $option3= $row['option3'];
        $option4= $row['option4'];
        $anser= $row['anser'];

    }
}
}
?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bg-white mt-5 bodrder border-secondary p-3 shadow-sm rounded">
                    <form action="c_mark.php?action=mark" method="post">
                        <h2 class="h5 mb-3"><?php echo 'سؤال '.$num.': '.$title; ?></h2>
                        <div class="container">
                            <div class="row row-cols-1 gy-2">
                                <div class="col">
                                    <div class="form-check">
                                        <input required id="check1" class="form-check-input" type="radio" name="option" value="1">
                                        <label class=" form-check-label" for="check1"><?php echo $option1; ?></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input id="check2" class="form-check-input" type="radio" name="option" value="2">
                                        <label class=" form-check-label" for="check2"><?php echo $option2; ?></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input id="check3" class="form-check-input" type="radio" name="option" value="3">
                                        <label class=" form-check-label" for="check3"><?php echo $option3; ?></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input id="check4" class="form-check-input" type="radio" name="option" value="4">
                                        <label class=" form-check-label" for="check4"><?php echo $option4; ?></label>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="num" value="<?php echo $num; ?>">
                                <input type="hidden" name="totle" value="<?php echo $totle; ?>">
                                <input type="hidden" name="anser" value="<?php echo $anser; ?>">
                                <input type="hidden" name="mark" value="<?php echo $mark; ?>">

                                <div class="col">
                                    <input class="btn btn-primary" type="submit" value="اختيار">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"?>
