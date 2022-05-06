<?php include '../includes/db.php' ?>
<?php include '../includes/function.php' ?>

<?php
if(CheckAdmin()){  
//add main question stap one
if(isset($_GET['action']) and $_GET['action']=='add_que'){
    $title   = validation($_POST['title']);
    $num_que = validation($_POST['num_que']);
    $mark    = validation($_POST['mark']);
    $id      = uniqid();
    $query="INSERT INTO main_que(id,title,num,mark) VALUES('{$id}','{$title}','{$num_que}','{$mark}')";
    $data=mysqli_query($connect,$query);
    if($data){
        header("Location:add_question2.php?id={$id}&num={$num_que}");
    }

}

//add questions stap two
if(isset($_GET['action']) and $_GET['action']=='add_que2'){
    $id=validation($_GET['id']);
    $num=validation($_GET['num']);
    $titleQue=$_POST['que'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    $anser=$_POST['ans'];


    for($i=0;$i<$num;$i++){
        $n=$i+1;
        $title=validation($titleQue[$i]);
        $op1=validation($option1[$i]);
        $op2=validation($option2[$i]);
        $op3=validation($option3[$i]);
        $op4=validation($option4[$i]);
        $ans=validation($anser[$i]);
        $query="INSERT INTO question(id_que,title,option1,option2,option3,option4,anser,n) ";
        $query.="VALUES('{$id}','{$title}','{$op1}','{$op2}','{$op3}','{$op4}','{$ans}',{$n})";
        $data=mysqli_query($connect,$query);
        if($data){

        }else{
            die('mysql error '.mysqli_error($connect));
        }
    }
 
        header("Location:index.php");
    
    


}

//edit main question step one
if(isset($_GET['action']) and $_GET['action']=='edit_one'){
    $id      = $_GET['id'];
    $num_que = $_GET['num'];
    $title   = validation($_POST['title']);
    $mark    = validation($_POST['mark']);

    $query="UPDATE main_que SET title='{$title}',mark='{$mark}' WHERE id='{$id}'";
    $data=mysqli_query($connect,$query);
    if($data){
        header("Location:edit_question.php?id={$id}&num={$num_que}");
    }else{
        die('error: '.mysqli_error($connect));
    }

}

//edit questions step two
    if(isset($_GET['action']) and $_GET['action']=='edit_que'){
        $id=validation($_GET['id']);
        $num=validation($_GET['num']);
        $titleQue=$_POST['que'];
        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];
        $anser=$_POST['ans'];

        for($i=0;$i<$num;$i++){
            $n=$i+1;
            $title=validation($titleQue[$i]);
            $op1=validation($option1[$i]);
            $op2=validation($option2[$i]);
            $op3=validation($option3[$i]);
            $op4=validation($option4[$i]);
            $ans=validation($anser[$i]);
            $query="UPDATE question SET title='{$title}',option1='{$op1}',option2='{$op2}',option3='{$op3}',option4='{$op4}',anser={$ans} WHERE id_que='{$id}' and n={$n}";
            $data=mysqli_query($connect,$query);
            if($data){

            }else{
                die('mysql error '.mysqli_error($connect));
            }
            header("Location:index.php");
        }
    }
}
?>