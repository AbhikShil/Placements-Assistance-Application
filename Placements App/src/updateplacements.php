<?php
session_start();
include('connection.php');

$p_id = $_POST['p_id'];
$note = $_POST['placementname'];
$time = time();
$sql = "UPDATE placements SET placementname='$note', time = '$time' WHERE p_id='$p_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}
?>