<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
//get username and email
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

$sqlp = "SELECT * FROM pusers WHERE username='$username'";
$resultp = mysqli_query($link, $sqlp);

$countp = mysqli_num_rows($resultp);

if($count == 1){
    header("location: profile1.php"); 
}
else if($countp == 1){
    header("location: profile2.php"); 
}
else{
    echo "There was an error retrieving the username and email from the database";   
}
?>