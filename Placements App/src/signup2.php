<?php
session_start();
include('connection.php'); 

$missingUsername = '<p><strong>Please Enter A Username!</strong></p>';
$missingEmail = '<p><strong>Please Enter Your Email ID!</strong></p>';
$invalidEmail = '<p><strong>Please Enter A Valid Email ID!</strong></p>';
$missingPassword = '<p><strong>Please Enter A Password!</strong></p>';
$invalidPassword = '<p><strong>Please Enter A Password With Atleast 6 Characters, One Number, And One Uppercase Letter!</strong></p>';
$differentPassword = '<p><strong>Passwords Mismatch, Please Check Again!</strong></p>';
$missingPassword2 = '<p><strong>Please Confirm Your Password!</strong></p>';
//$missingUniver='<p>Please Select A University</p>'

if(empty($_POST["username"])){
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);   
}

if(empty($_POST["email"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}

//if(empty($_POST["university"])){
//    $errors .= $missingUniver;
//}else{
//    $university = filter_var($_POST["university"], FILTER_SANITIZE_STRING);   
//}
$university = filter_var($_POST["university"], FILTER_SANITIZE_STRING);  
if(empty($_POST["password"])){
    $errors .= $missingPassword; 
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$university = mysqli_real_escape_string($link, $university);
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256', $password);
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
$sqlp = "SELECT * FROM pusers WHERE username = '$username'";
$resultp = mysqli_query($link, $sqlp);
if(!$result or !resultp){
    echo '<div class="alert alert-danger">There Was An Error Running The Query!</div>';
    exit;
}
$results = mysqli_num_rows($result);
$resultsp = mysqli_num_rows($resultp);
if($results or $resultsp){
    echo '<div class="alert alert-danger">This Username Already Exisits. Please Log In!</div>';  exit;
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There Was An Error Running The Query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">This Email Already Exisits. Please Log In!</div>';  exit;
}

$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
//$uni=strval($university)

if(empty($_POST["adm"])){
    $sql = "INSERT INTO `users` (`username`, `email`,`university`, `password`, `activation`) VALUES ('$username', '$email','$university', '$password', '$activationKey')";
$abcd=strval($sql);

//$sql = "INSERT INTO `users` (`username`, `email`, `password`, `activation`) VALUES ('abhik','hjgjhgj','hgfhgfjhg','ghfhgfjhfjh')";
$result = mysqli_query($link, $abcd);
if(!$result){
    echo '<div class="alert alert-danger">There Was An Error Populating The Database! ' . $sql .'</div>'; 
    exit;
}

$message = "Please click on this link to activate your account:\n\n";
$message .= "http://abhikshil.host20.uk/Placements%20App/activate.php?email=" . $email . "&key=$activationKey";
if(mail($email, 'Confirm your Registration', $message, 'From:'.'abhikshil@gmail.com')){
       echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
}
 else{
     echo "<div class='alert alert-success'>ohhh</div>";
 }       
}

else{
    $sql = "INSERT INTO `pusers` (`username`, `email`,`university`, `password`, `activation`) VALUES ('$username', '$email','$university', '$password', '$activationKey')";
$abcd=strval($sql);

//$sql = "INSERT INTO `users` (`username`, `email`, `password`, `activation`) VALUES ('abhik','hjgjhgj','hgfhgfjhg','ghfhgfjhfjh')";
$result = mysqli_query($link, $abcd);
if(!$result){
    echo '<div class="alert alert-danger">There Was An Error Populating The Database! ' . $sql .'</div>'; 
    exit;
}

$message = "Please click on this link to activate this account:\n\n";
$message .= "http://abhikshil.host20.uk/Placements%20App/activatep.php?email=" . $email . "&key=$activationKey";
if(mail($email, 'Confirm your Registration', $message, 'From:'.'abhikshil@gmail.com')){
       echo "<div class='alert alert-success'>Thank for your registring! A confirmation email will be been sent to $email. After You Are Verified as a Placement Co-ordinator of the university</div>";
}
}

?>