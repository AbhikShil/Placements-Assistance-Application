<?php
session_start();
include ('connection.php');
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$newemail = $_POST['email'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

$sqlp = "SELECT * FROM pusers WHERE username='$username'";
$resultp = mysqli_query($link, $sqlp);

$countp = mysqli_num_rows($resultp);

if($count == 1){
    $sql = "SELECT * FROM users WHERE email='$newemail'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count>0){
    echo "<div class='alert alert-danger'>There is already as user registered with that email! Please choose another one!</div>"; exit;
}
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    $email = $row['email']; 
}else{
    echo "<div class='alert alert-danger'>There was an error retrieving the email from the database</div>";exit;   
}
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
$sql = "UPDATE users SET activation2='$activationKey' WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>There was an error inserting the user details in the database.</div>";exit;
}else{
    $message = "Please click on this link prove that you own this email:\n\n";
$message .= "http://abhikshil.host20.uk/Placements%20App/activatenewemail.php?email=" . urlencode($email) . "&newemail=" . urlencode($newemail) . "&key=$activationKey";
if(mail($newemail, 'Email Update for you Online Notes App', $message, 'From:'.'abhikshil@gmail.com')){
       echo "<div class='alert alert-success'>An email has been sent to $newemail. Please click on the link to prove you own that email address.</div>";
}   
}
}
else if($countp == 1){
    $sql = "SELECT * FROM pusers WHERE email='$newemail'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count>0){
    echo "<div class='alert alert-danger'>There is already as user registered with that email! Please choose another one!</div>"; exit;
}
$sql = "SELECT * FROM pusers WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    $email = $row['email']; 
}else{
    echo "<div class='alert alert-danger'>There was an error retrieving the email from the database</div>";exit;   
}
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
$sql = "UPDATE pusers SET activation2='$activationKey' WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>There was an error inserting the user details in the database.</div>";exit;
}else{
    $message = "Please click on this link prove that you own this email:\n\n";
$message .= "http://abhikshil.host20.uk/Placements%20App/activatenewemailp.php?email=" . urlencode($email) . "&newemail=" . urlencode($newemail) . "&key=$activationKey";
if(mail($newemail, 'Email Update for you Online Notes App', $message, 'From:'.'abhikshil@gmail.com')){
       echo "<div class='alert alert-success'>An email has been sent to $newemail. Please click on the link to prove you own that email address.</div>";
}   
} 
}
else{
    echo "There was an error retrieving the username and email from the database";   
}
?>