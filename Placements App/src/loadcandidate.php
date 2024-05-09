<?php
session_start();
include('connection.php');
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM pusers WHERE user_id ='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $username = $row['username'];
    $email = $row['email']; 
    $univer = $row['university'];
}else{
    echo "There was an error retrieving the data from the database";   
}
$sql = "SELECT * FROM resume";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);


if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $note_id = $row['r_id'];
            $note = $row['name'];
            $time = $row['email'];
            
            echo "
        <div class='note'>
            <div class='col-xs-5 col-sm-3 delete'>
                <button class='btn-lg btn-danger' style='width:100%'>delete</button>
            
            </div>
            <div class='noteheader' id='$note_id'>
                <div class='text'>$note</div>
                <div class='text'>$time</div>    
            </div>
        </div>";
        }
    }else{
        echo '<div class="alert alert-warning">There Are No Candidates yet!</div>'; exit;
    }
    
}else{
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
}

?>