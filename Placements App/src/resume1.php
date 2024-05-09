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
        <button type="button" class="btn btn-lg btn-success signup" data-target="#signupSec" data-toggle="modal">Create Your Resume</button>
    </div>
      <!--Resume Form-->
      <form method="post" id="resumeform">
        <div class="modal" id="signupSec" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Create Your Resume
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group">
                      <label for="fullname">Full Name</label>
                      <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Full Name" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="dob">Date Of Birth:</label>
                      <input class="form-control" type="date" name="dob" id="dob" placeholder="Date Of Birth" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="email">Officail Email Id:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Official Email Id" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="pno">Phone Number</label>
                      <input class="form-control" type="text" name="pno" id="pno" placeholder="Phone No. With Country Code" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="address">Local Address</label>
                      <input class="form-control" type="text" name="address" id="address" placeholder="Local Address">
                  </div>
                  <div class="form-group">
                      <label for="state">State</label>
                      <input class="form-control" type="text" name="state" id="state" placeholder="State" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="country">Country</label>
                      <input class="form-control" type="text" name="country" id="country" placeholder="Country" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="objective">Objective</label>
                      <input class="form-control" type="text" name="objective" id="objective" placeholder="Objective">
                  </div>
                  <div class="form-group">
                      <label for="hobbies">Hobbies:</label>
                      <textarea rows="2" name="hobbies" id="hobbies" placeholder="Hobbies"></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label for="edu">Education</label>
                      <textarea rows="2" name="edu" id="edu" placeholder="List Out Your Education Journey"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="yexp">Years Of Experience:</label>
                    <select class="form-control" id="yexp" name="yexp">
		              <option value="">Select</option>
		              <option>Fresher</option>
		              <option>One year</option>
		              <option>Two year</option>
		              <option>More than two years</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                      <label for="exp">Experience</label>
                      <textarea rows="2" name="exp" id="exp" placeholder="Experience"></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label for="skills">Skills</label>
                      <textarea rows="2" name="skills" id="skills" placeholder="List Out Your Skills Here"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="hq">Highest Qualification</label>
                    <select class="form-control" id="hq" name="hq">
                        <option value="">Select</option>
		                <option>High School</option>
		                <option>Bachelor's Degree</option>
		                <option>Diploma</option>
		                <option>Master's Degree</option>
		                <option>Others</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="port">Portfolio Link</label>
                      <textarea rows="2" name="port" id="port" placeholder="Portfolio Link If Any(Leave Empty If None)"></textarea>
                  </div>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="adm" id="adm">
                        I Agree All The Information Provided Is True To My Knowledge.
                      </label>
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn btn-success" name="signup" type="submit" value="Submit">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>
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
    <script src="resume.js"></script>
  </body>
</html>