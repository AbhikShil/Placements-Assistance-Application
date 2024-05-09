<?php
session_start();
include('connection.php');
$user_id = $_SESSION['p_id'];
$time = time();
$sql = "INSERT INTO notes (`p_id`, `note`, `time`) VALUES ($user_id, '', '$time')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}else{
    echo mysqli_insert_id($link);
    $_SESSION['id']=mysqli_insert_id($link);
}
?>