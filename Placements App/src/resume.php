<?php
    session_start();
    include("connection.php");
    $uid = $_SESSION['user_id'];
    $sql = "SELECT * FROM resume WHERE user_id= '$uid'";
    $result = mysqli_query($link,$sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }    //If email & password don't match print error
    $count = mysqli_num_rows($result);
    if($count !== 1){
       header("location: resume1.php");
    }
    else{
        header("location: resume2.php");
    }
?>