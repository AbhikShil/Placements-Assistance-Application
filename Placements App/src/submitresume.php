<?php
session_start();
include('connection.php'); 
$uid = $_SESSION['user_id'];
$mname = '<p><strong>Please Enter Your Name!</strong></p>';
$mdob = '<p><strong>Please Enter Your Date Of Birth!</strong></p>';
$missingEmail = '<p><strong>Please Enter Your Email ID!</strong></p>';
$invalidEmail = '<p><strong>Please Enter A Valid Email ID!</strong></p>';
$mpno = '<p><strong>Please Enter Your Phone Number!</strong></p>';
$madr = '<p><strong>Please Enter Your Address!</strong></p>';
$mstate = '<p><strong>Please Enter Your State!</strong></p>';
$mcon = '<p><strong>Please Enter Your Country!</strong></p>';
$mobj = '<p><strong>Please Enter Your Objective!</strong></p>';
$mhobb = '<p><strong>Please Enter Your Hobbies!</strong></p>';
$medu = '<p><strong>Please Enter About Your Education!</strong></p>';
$myexp = '<p><strong>Please Enter Your Years Of Experience</strong></p>';
$mexp = '<p><strong>Please Give Deatails About Your Experience!(Type "None" For No Experience)</strong></p>';
$mskills = '<p><strong>Please Enter Your Skills!</strong></p>';
$mqual = '<p><strong>Please Choose Your Qualification!</strong></p>';
$magree = '<p><strong>Please Agree To Our Terms, By Clicking The Check Box!</strong></p>';
//$missingUniver='<p>Please Select A University</p>'

if(empty($_POST["fullname"])){
    $errors .= $mname;
}else{
    $name = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);   
}

if(empty($_POST["email"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}
if(empty($_POST["pno"])){
    $errors .= $mpno;
}else{
    $pno = filter_var($_POST["pno"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["dob"])){
    $errors .= $mdob;
}else{
    $dob = filter_var($_POST["dob"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["address"])){
    $errors .= $madr;
}else{
    $adr = filter_var($_POST["address"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["state"])){
    $errors .= $mstate;
}else{
    $state = filter_var($_POST["state"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["country"])){
    $errors .= $mcon;
}else{
    $con = filter_var($_POST["country"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["objective"])){
    $errors .= $mobj;
}else{
    $obj = filter_var($_POST["objective"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["hobbies"])){
    $errors .= $mhobb;
}else{
    $hobb = filter_var($_POST["hobbies"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["edu"])){
    $errors .= $medu;
}else{
    $edu = filter_var($_POST["edu"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["yexp"])){
    $errors .= $myexp;
}else{
    $yexp = filter_var($_POST["yexp"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["exp"])){
    $errors .= $mexp;
}else{
    $exp = filter_var($_POST["exp"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["skills"])){
    $errors .= $mskills;
}else{
    $skills = filter_var($_POST["skills"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["hq"])){
    $errors .= $mqual;
}else{
    $qual = filter_var($_POST["hq"], FILTER_SANITIZE_STRING);   
}
if(empty($_POST["adm"])){
    $errors .= $magree;
}
if(empty($_POST["port"])){
    $port= filter_var("", FILTER_SANITIZE_STRING);
}else{
    $port = filter_var($_POST["port"], FILTER_SANITIZE_STRING);   
}
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}
$name = mysqli_real_escape_string($link, $name);
$email = mysqli_real_escape_string($link, $email);
$pno = mysqli_real_escape_string($link, $pno);
$dob = mysqli_real_escape_string($link, $dob);
$adr = mysqli_real_escape_string($link, $adr);
$state = mysqli_real_escape_string($link, $state);
$con = mysqli_real_escape_string($link, $con);
$obj = mysqli_real_escape_string($link, $obj);
$edu = mysqli_real_escape_string($link, $edu);
$hobb = mysqli_real_escape_string($link, $hobb);
$yexp = mysqli_real_escape_string($link, $yexp);
$exp = mysqli_real_escape_string($link, $exp);
$skills = mysqli_real_escape_string($link, $skills);
$qual = mysqli_real_escape_string($link, $qual);
$port = mysqli_real_escape_string($link, $port);
$sql = "DELETE FROM resume WHERE user_id = '$uid'";
$result = mysqli_query($link, $sql);
if(!$result or !resultp){
    echo '<div class="alert alert-danger">There Was An Error Running The Query!</div>';
    exit;
}
//$results = mysqli_num_rows($result);
//$resultsp = mysqli_num_rows($resultp);
//if($results or $resultsp){
//    echo '<div class="alert alert-danger">This Username Already Exisits. Please Log In!</div>';  exit;
//}

$sql = "INSERT INTO `resume` (`user_id`,`name`, `dob`,`email`, `pno`, `adr`,`state`,`con`,`obj`,`edu`,`hobb`,`yexp`,`exp`,`skills`,`qual`,`port`) VALUES ('$uid','$name','$dob','$email', '$pno', '$adr','$state','$con','$obj','$edu','$hobb','$yexp','$exp','$skills','$qual','$port')";
$abcd=strval($sql);

//$sql = "INSERT INTO `users` (`username`, `email`, `password`, `activation`) VALUES ('abhik','hjgjhgj','hgfhgfjhg','ghfhgfjhfjh')";
$result = mysqli_query($link, $abcd);
if(!$result){
    echo '<div class="alert alert-danger">There Was An Error Populating The Database! ' . $sql .'</div>'; 
    exit;
}     
else{
    echo '<div class="alert alert-success">Your Resume Was Submitted Successfully. Click On The Link To Refresh The Page.</div> <a href="resume.php">Refresh</a>';
}


?>