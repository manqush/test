<?php
// validation data
function validation($data){
    global $connect;
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
$data=mysqli_real_escape_string($connect,$data);
return $data;
}

//set session
function SetSession($key,$val){
    session_start();
    $_SESSION[$key]=$val;
}
function removeSesstion($key){
    session_start();
    $_SESSION[$key]=null;
}

//get session
function getSession($key){
    session_start();
    if(isset($_SESSION[$key]) and $_SESSION[$key]!= null){
        return $_SESSION[$key];
    }else{
        return false;
    }
}

//check admin session
function CheckAdmin(){
    session_start();
    if(getSession('admin')== true and getSession('admin')!=null){
        return true;
    }else{
        return false;
    }
}

//session destory
function destory(){
    session_destroy();
    session_unset();
}

?>