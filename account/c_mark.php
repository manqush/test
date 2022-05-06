<?php include "../includes/function.php"?>
<?php include "../includes/db.php"?>
<?php
if(getSession('username')){
if(isset($_GET['action']) and $_GET['action']=='mark'){
    $username=getSession('username');
    $option=$_POST['option'];
    $id=$_POST['id'];
    $num=$_POST['num'];
    $totle=$_POST['totle'];
    $anser=$_POST['anser'];
    $mark=$_POST['mark'];
    $m_option=($mark/$totle);
    $tonum=$num+1;
    $db_conition=false;

    if($tonum<=$totle){
        header("Location:test.php?action=qus&id={$id}&n={$tonum}&t={$totle}&m={$mark}");
    }else{
        header("Location:index.php");
    }

    $query="SELECT * FROM mark";
    $data= mysqli_query($connect,$query);
    while($row=mysqli_fetch_assoc($data)){
       $DB_username= $row['username'];
       $DB_id=$row['id_que'];
       if($DB_username ==$username and $DB_id==$id){
        $db_conition=true;
        break;
       }
    }

    if($anser==$option){
        if($db_conition){
            $query="UPDATE mark SET mark=mark+{$m_option} WHERE username='{$username}' and id_que='{$id}'";
            $data=mysqli_query($connect,$query);
        }else{
            $query="INSERT INTO mark(username,id_que,mark) VALUES('{$username}','{$id}',{$m_option})";
            $data=mysqli_query($connect,$query);
        }
    }else{
        if($db_conition){

        }else{
            $query="INSERT INTO mark(username,id_que) VALUES('{$username}','{$id}')";
            $data=mysqli_query($connect,$query);
        }
    }



}
}
?>