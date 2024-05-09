<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Placement Assistance</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="styling3.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
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
            border-left-width: 10px;
            border-right-width: 10px;
            border-color: #ff751a;
            color: #CA3DD9;
            background-color: #ffff99;
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
        
        .bodyimage{
            height: 100px;   
        }

        .col-md-4{
            text-align: center;
            color:black;
            font-weight:bold;
        }
        .col-md-4:nth-child(4){
            margin-left: 340px;
        }

        .icons p{
            font-size: 15px;   
        }
        .icons{
            margin-bottom: 80px;
        }
        /*Style contact button*/
        .contact{
            text-align: center;
            margin-top: 30px;
            margin-bottom: 100px;
        }
      </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navitems" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="mainloginpage.php">Placement Assistant</a>
    </div>
    <div class="collapse navbar-collapse" id="navitems">
      <ul class="nav navbar-nav">
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="helplogin.php" class="ct">Help</a></li>
        <li class="active"><a href="aboutuslogin.php" class="ct">About Us</a></li>
        <li><a href="mainloginpage.php">Placements<span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Logged in as <b><?php echo $_SESSION['username']?></b></a></li>
        <li><a href="index.php?logout=1">Log out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--Content-->
<div class="jumbotron">
    <div style="color:black;">
        <h1>About Us Page</h1>
        <p>We Are Students of Reva University </p>
        <p>And We are here to help u</p>
    </div>
</div>

<div class="icons">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <img src="abhik.jpg" class="bodyimage"> 
                  <h2>Abhik Shil</h2>
                  <p>Phone Number:+91 7892542208</p>
                  <p>Email:abhikshil@gmail.com</p>
               </div>
               <div class="col-md-4">
                  <img src="amegh.jpg" class="bodyimage"> 
                  <h2>Amegh R</h2>
                  <p>Phone Number:+91 9496745794</p>
                  <p>Email:amegh.r@gmail.com</p>
               </div>
               <div class="col-md-4">
                  <img src="abhishek.jpg" class="bodyimage"> 
                  <h2>Abhishek Kumar</h2>
                  <p>Phone Number:+91 9031337327</p>
                  <p>Email:abhi.desiboyz@gmail.com</p>
                </div>
                <div class="col-md-4" id="ss">
                  <img src="ankur.jpeg" class="bodyimage"> 
                  <h2>Ankur Jha</h2>
                  <p>Phone Number:+91 9590186807</p>
                  <p>Email:ank72013@gmail.com</p>
               </div>
            </div>
         </div>
      </div>
<!--
<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="abhik.jpg" style="height: 120px;width: 120px;padding-left: 90px;padding-top: 10px">
      <div class="container">

        <h2>Abhik Shil</h2>
-->
<!--
            <p>Email:<span style="color:blue">abhikshil@gmail.com</span></p>
            <p>Phone No:<span style="color:blue">+91 7892542208</span></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
    
      <div class="container">
        <img src="amegh.jpg" style="height:85px; width:110px; padding-left: 90px;padding-top: 10px">
            <h2>Amegh R</h2>
            <p>Email:<span style="color:blue">amegh.r@gmail.com</span></p>
            <p>Phone No:<span style="color:blue">+91 9496745794</span></p>
        
        
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="column">
    <div class="card">
      
      <div class="container">
        <img src="abhishek.jpg" style="height:85px; width:110px;padding-left: 90px;padding-top: 10px"> 
            <h2>Abhishek Kumar</h2>
            <p>Email:<span style="color:blue">abhi.desiboyz@gmail.com</span></p>
            <p>Phone No:<span style="color:blue">+91 9031337327</span></p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      
      <div class="container">
        <img src="ankur.jpg" style="height:85px; width:110px; padding-left: 90px;padding-top: 10px"> 
            <h2>Ankur Jha</h2>
            <p>Email:<span style="color:blue">ank72013@gmail.com</span></p>
            <p>Phone No:<span style="color:blue">+91 9590186807</span></p>
        
      </div>
    </div>
  </div>
</div>
-->
    <!--Footer-->
    <div class="footer">
        <div class="container">
            <p>AbhikShil Copyright &copy; 2021-<?php $today=date("Y"); echo $today?>.</p>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="mynotes.js"></script>
  </body>
</html>