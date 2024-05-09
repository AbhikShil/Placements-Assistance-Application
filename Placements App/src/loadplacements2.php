<?php
session_start();
include('connection.php');
$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM placements WHERE placementname=''";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
}
//$sqlp = "DELETE FROM placements WHERE placementname=''";
//$result = mysqli_query($link, $sql);
//if(!$result){
//    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
//}

$sql = "SELECT * FROM placements ORDER BY time DESC";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $note_id = $row['p_id'];
            $note = $row['placementname'];
            $time = $row['time'];
            $time = date("F d, Y h:i:s A", $time);
            
            echo "
        <div class='note'>
            <div class='col-xs-5 col-sm-3 delete'>
                <button class='btn-lg btn-danger' style='width:100%'>delete</button>
            
            </div>
            <div class='noteheader' id='$note_id'>
                <div class='text'>$note</div>
                <div class='timetext'>$time</div>    
            </div>
        </div>";
        }
    }else{
        echo '<div class="alert alert-warning">You have not created any placements yet!</div>'; exit;
    }
    
}else{
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
}

?>