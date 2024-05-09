<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//remember me
include('remember.php');
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
    <link rel="stylesheet" href="styling.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        textarea{
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 10px;
            border-right-width: 10px;
/*            border-color: #ff751a;*/
/*            color: #CA3DD9;*/
            background-color: white;
            padding: 10px;
              
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
      <a class="navbar-brand" href="mainloginpagestu.php">Placement Assistant</a>
    </div>
    <div class="collapse navbar-collapse" id="navitems">
      <ul class="nav navbar-nav">
        <li><a href="profile.php">My Profile</a></li>
        <li class="active"><a href="resume.php">Resume</a></li>
        <li><a href="helploginstu.php" class="ct">Help</a></li>
        <li><a href="aboutusloginstu.php" class="ct">About Us</a></li>
        <li><a href="mainloginpagestu.php">Placements<span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Logged in as <b><?php echo $_SESSION['username']?></b></a></li>
        <li><a href="index.php?logout=1">Log out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--Conent Of Main Page-->
    <div class="jumbotron" id="myContent">
        <h1>Welcome To <span id="titleStyle">Our Placement Assistant Portal.</span></h1>
        <h2>Create Your Own Resume.</h2>
        <p>Download It And Store It Locally As Pdf.</p>
        <p>Access It From Anywhere From The World.</p>
        <p>Your Info Will Be Private And Secure</p>
        <button type="button" class="btn btn-lg btn-success signup" onclick="document.location='resumeview.php'">View Your Resume</button>
    </div>
    <!--Footer-->
    <div class="footer">
        <div class="container">
            <p>TeamUs Copyright &copy; 2021-<?php $today=date("Y"); echo $today?>.</p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
  </body>
</html>