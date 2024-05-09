<?php
session_start();
include('connection.php');
$missingName = '<p><strong>Please enter the Company Name!</strong></p>';
if(empty($_POST["forgotemail"])){
    $errors .= $missingName;   
}else{
    $name = filter_var($_POST["forgotemail"], FILTER_SANITIZE_STRING);
}

if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}
$name = mysqli_real_escape_string($link, $name);
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM placements WHERE placementname = '$name' and user_id = '$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$count = mysqli_num_rows($result);

if($count == 1){
    echo '<div class="alert alert-danger">That Company exist on our database!</div>';  exit;
}
$time = time();
$sql = "INSERT INTO placements (`user_id`, `placementname`, `time`) VALUES ('$user_id', '$name', '$time')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}else{
    echo mysqli_insert_id($link);
    $_SESSION["p_id"]=mysqli_insert_id($link);
    $_SESSION["pname"]=$name;
}
?>