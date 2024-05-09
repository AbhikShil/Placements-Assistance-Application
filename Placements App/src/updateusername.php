<?php
session_start();
include ('connection.php');
$id = $_SESSION['user_id'];
$uname=$_SESSION['username'];
$username = $_POST['username'];
$sql = "SELECT * FROM users WHERE username='$uname'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

$sqlp = "SELECT * FROM pusers WHERE username='$uname'";
$resultp = mysqli_query($link, $sqlp);

$countp = mysqli_num_rows($resultp);

if($count == 1){
    $sql = "UPDATE users SET username='$username' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
    }
    $_SESSION['username']=$username;
}
else if($countp == 1){
     $sql = "UPDATE pusers SET username='$username' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
    }
    $_SESSION['username']=$username;
}
else{
    echo "There was an error retrieving the username and email from the database";   
}
?>