<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
$uabc=$_SESSION['user_id'];
include('connection.php');
if(!empty($_POST['id'])){
    $user_id = $_POST['id'];
    $_SESSION['re_id']=$user_id;
}else{
    $user_id=$_SESSION['re_id'];
}
$uid= $_SESSION['user_id'];


$username= $_SESSION['username'];

//get username and email
$sql = "SELECT * FROM resume WHERE r_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

$sqlp = "SELECT * FROM resume WHERE user_id='$user_id'";
$resultp = mysqli_query($link, $sqlp);

$countp = mysqli_num_rows($resultp);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $name = $row['name'];
    $email = $row['email']; 
    $dob = $row['dob'];
    $pno = $row['pno'];
    $adr = $row['adr'];
    $state = $row['state'];
    $con = $row['con'];
    $obj = $row['obj'];
    $hobb = $row['hobb'];
    $yexp = $row['yexp'];
    $exp = $row['exp'];
    $skills = $row['skills'];
    $qual = $row['qual'];
    $port = $row['port'];
    $edu = $row['edu'];
}
else if($countp == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $name = $row['name'];
    $email = $row['email']; 
    $dob = $row['dob'];
    $pno = $row['pno'];
    $adr = $row['adr'];
    $state = $row['state'];
    $con = $row['con'];
    $obj = $row['obj'];
    $hobb = $row['hobb'];
    $yexp = $row['yexp'];
    $exp = $row['exp'];
    $skills = $row['skills'];
    $qual = $row['qual'];
    $port = $row['port'];
    $edu = $row['edu'];
}
else{
    echo "There was an error retrieving the username and email from the database";   
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Placement Assistant</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<!--    <link rel="stylesheet" href="styling2.css">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
    font-family: 'Original Surfer', cursive;
/*
    background: url("Placement3.jpg") no-repeat center center;
    background-attachment: fixed;
    background-size: cover;
*/
}


/*Style Jumbotron*/
.jumbotron{
    letter-spacing: 2.5px;
    height: 100%;
    padding: 10px;
    margin-top: 80px;
    margin-left: 120px;
    margin-right: 120px;
    margin-bottom: 200px;
    border: 10px;
    border-radius: 10px;
    color: black;
    background-color:cornsilk;
}

/*buttons*/
.signup{
    margin-top: 50px;  
    margin-bottom: 50px;
}

.btn-success{
    background-color: rgba(114,192,35,0.8);   
}

.btn-success:hover{
    background-color: rgb(114,192,35);   
}
        #container{
            margin-top:120px;   
        }

        #notePad,
        #allNotes, #done, .delete{
            display: none;   
        }

        .buttons{
            margin-bottom: 20px;   
        }

        textarea{
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
/*            height: 40px;*/
/*
            border-left-width: 10px;
            border-right-width: 10px;
*/
/*            border-color: #ff751a;*/
            color: black;
            background-color: white;
            padding: 10px;
              
        }
        
        .noteheader{
            border: 1px solid grey;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 0 10px;
            background: linear-gradient(#FFFFFF,#ECEAE7);
        }
          
        .text{
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
          
        .timetext{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .notes{
            margin-bottom: 100px;
        }
        
        #resumedone{

/*            height: 600px;*/
/*            width:200px;*/
            color: black;
            background-color: aliceblue;
        }
        .divs{
            margin-top: 10px;
            margin-bottom: 10px;
            color: black;
            margin: 20px 20px 40px 40px;
        }
        
        #div1{
           background-color: "#66b3ff";
           text-align: center;
        }
        p{
            font-size: 20px;
        }
        h1,h2,h3{
            text-align: center
        }
        #exit,#edit{
            margin-right: 20px;
        }
        #download{
            margin-left: 20px;
        }

      </style>
  </head>
  <body>
      <div id="resumedone" class="jumbotron">
        <h1 style="margin: auto auto;">Resume</h1>
          <div class="divs" id="div1">
            <h2>My Bio</h2>
              <p><strong>Name:</strong><?php echo $name; ?></p>
              <p><strong>Email:</strong><?php echo $email; ?></p>
              <p><strong>D.O.B:</strong><?php echo $dob; ?></p>
              <p><strong>Phone Number:</strong><?php echo $pno; ?></p>
              <p><strong>Address:</strong></p>
            <p><?php echo $adr; ?></p>
              <p><strong>State:</strong><?php echo $state; ?></p>
              <p><strong>Country:</strong><?php echo $con; ?></p>
              <p><strong>Highest Qualification:</strong><?php echo $qual; ?></p>
            <p><strong>Portfolio/Project Link:</strong><?php 
                if(empty($port)){
                    echo "No Link Currently Available";
                }else{
                    echo $port;   
                }
                ?></p>
          </div>
          <div class="divs">
            <h3>Objective</h3>
            <textarea readonly><?php echo $obj; ?></textarea>
          </div>
          <div class="divs">
            <h3>Hobbies</h3>
            <textarea readonly id="body"><?php echo $hobb; ?></textarea>
          </div>
          <div class="divs">
            <h3>Education</h3>
            <textarea readonly ><?php echo $edu; ?></textarea>
          </div>
          <div class="divs">
            <h3>Experience</h3>
              <p><strong>Years Of Experience:</strong><?php echo $yexp; ?></p>
              <textarea readonly><?php echo $exp; ?></textarea>
          </div>
          <div class="divs">
            <h3>Skills</h3>
              <textarea readonly><?php echo $skills; ?></textarea>
          </div>
          <div class="divs">
            <h3>Self Declaration</h3>
            <p>I hereby declare that the above-mentioned particulars are true to the best of my knowledge and belief</p>
              
                  <p><strong>Signature</strong></p>
                  <p><?php echo $name; ?></p>
            </div>
      </div>
    <!--forms-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>-->
<!--    <script type="text/javascript" src="jspdf.umd.min.js"></script>-->

      <?php
      $user_id = $uabc;
      echo "success" ?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="resume.js"></script>
<!--    <script src="javascript.js"></script>-->
  </body>
</html>