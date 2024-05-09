<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];
$username= $_SESSION['username'];

//get username and email
$sql = "SELECT * FROM resume WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

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
}else{
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
    <link rel="stylesheet" href="styling2.css">
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
           background-color: rgb(102, 179, 255);
           text-align: center;
        }
        p{
            font-size: 20px;
        }
        h1,h2,h3{
            text-align: center;
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
        <li><a href="profile.php">My Profile<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="resume.php" class="ct">Resume</a></li>
        <li><a href="helploginstu.php" class="ct">Help</a></li>
        <li><a href="aboutusloginstu.php" class="ct">About Us</a></li>
        <li><a href="mainloginpagestu.php">Placements</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Logged in as <b><?php echo $username; ?></b></a></li>
        <li><a href="index.php?logout=1">Log out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--Content-->
      <h2 style="color: orange;">Your Resume:</h2>
      <div class="buttons">
                      <button id="edit" type="button" class="btn btn-warning btn-lg pull-right" data-target="#signupSec" data-toggle="modal">Edit</button>
                      <button id="exit" type="button" class="btn green btn-danger btn-lg pull-right">Exit</button>
                      <button id="cmd" type="button" class="btn green btn-success btn-lg pull-left" onclick="printDiv('resumedone','Title')">Download</button>
      </div>
      <div id="resumedone" class="jumbotron" style="letter-spacing: 2.5px;
    height: 100%;
    padding: 10px;
    margin-top: 80px;
    margin-left: 120px;
    margin-right: 120px;
    margin-bottom: 200px;
    border: 10px;
    border-radius: 10px;
    color: black;
    background-color:cornsilk;">
        <h1 style="text-align: center;">Resume</h1>
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
            <textarea rows="4" readonly style="width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;"><?php echo $obj; ?></textarea>
          </div>
          <div class="divs">
            <h3>Hobbies</h3>
            <textarea id="body" rows="4" readonly style="width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;"><?php echo $hobb; ?></textarea>
          </div>
          <div class="divs">
            <h3>Education</h3>
            <textarea readonly rows="4" style="width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;"><?php echo $edu; ?></textarea>
          </div>
          <div class="divs">
            <h3>Experience</h3>
              <p><strong>Years Of Experience:</strong><?php echo $yexp; ?></p>
              <textarea readonly rows="4" style="width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;"><?php echo $exp; ?></textarea>
          </div>
          <div class="divs">
            <h3>Skills</h3>
              <textarea readonly rows="4" style="width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;"><?php echo $skills; ?></textarea>
          </div>
          <div class="divs">
            <h3>Self Declaration</h3>
            <p>I hereby declare that the above-mentioned particulars are true to the best of my knowledge and belief</p>
              
                  <p><strong>Signature</strong></p>
                  <p><?php echo $name; ?></p>
            </div>
      </div>
    <!--forms-->
    <!--Update username-->    
      <form method="post" id="updateusernameform">
        <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Edit Username: 
                  </h4>
              </div>
              <div class="modal-body">
                  <div id="updateusernamemessage"></div>
                  

                  <div class="form-group">
                      <label for="username" >Username:</label>
                      <input class="form-control" type="text" name="username" id="username" maxlength="30" value="<?php echo $username; ?>">
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn btn-success" name="updateusername" type="submit" value="Submit">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                  Cancel
                </button> 
              </div>
          </div>
      </div>
      </div>
      </form>
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
                      <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Full Name" maxlength="30"value="<?php echo $name; ?>">
                  </div>
                  <div class="form-group">
                      <label for="dob">Date Of Birth:</label>
                      <input class="form-control" type="date" name="dob" id="dob" placeholder="Date Of Birth" maxlength="50" value="<?php echo $dob; ?>">
                  </div>
                  <div class="form-group">
                      <label for="email">Officail Email Id:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Official Email Id" maxlength="50" value="<?php echo $email; ?>">
                  </div>
                  <div class="form-group">
                      <label for="pno">Phone Number</label>
                      <input class="form-control" type="text" name="pno" id="pno" placeholder="Phone No. With Country Code" maxlength="50" value="<?php echo $pno; ?>">
                  </div>
                  <div class="form-group">
                      <label for="address">Local Address</label>
                      <input class="form-control" type="text" name="address" id="address" placeholder="Local Address" value="<?php echo $adr; ?>">
                  </div>
                  <div class="form-group">
                      <label for="state">State</label>
                      <input class="form-control" type="text" name="state" id="state" placeholder="State" maxlength="50" value="<?php echo $state; ?>">
                  </div>
                  <div class="form-group">
                      <label for="country">Country</label>
                      <input class="form-control" type="text" name="country" id="country" placeholder="Country" maxlength="50" value="<?php echo $con; ?>">
                  </div>
                  <div class="form-group">
                      <label for="objective">Objective</label>
                      <input class="form-control" type="text" name="objective" id="objective" placeholder="Objective" value="<?php echo $obj; ?>">
                  </div>
                  <div class="form-group">
                      <label for="hobbies">Hobbies:</label>
                      <textarea rows="2" name="hobbies" id="hobbies" placeholder="Hobbies"><?php echo $hobb; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label for="edu">Education</label>
                      <textarea rows="2" name="edu" id="edu" placeholder="List Out Your Education Journey" value=""><?php echo $edu; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="yexp">Years Of Experience:</label>
                    <select class="form-control" id="yexp" name="yexp">
		              <option value="<?php echo $yexp; ?>">Select</option>
		              <option>Fresher</option>
		              <option>One year</option>
		              <option>Two year</option>
		              <option>More than two years</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                      <label for="exp">Experience</label>
                      <textarea rows="2" name="exp" id="exp" placeholder="Experience" value=""><?php echo $exp; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label for="skills">Skills</label>
                      <textarea rows="2" name="skills" id="skills" placeholder="List Out Your Skills Here" value="">
                      <?php echo $skills; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="hq">Highest Qualification</label>
                    <select class="form-control" id="hq" name="hq">
                        <option value="<?php echo $qual; ?>">Select</option>
		                <option>High School</option>
		                <option>Bachelor's Degree</option>
		                <option>Diploma</option>
		                <option>Master's Degree</option>
		                <option>Others</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="port">Portfolio Link</label>
                      <textarea rows="2" name="port" id="port" placeholder="Portfolio Link If Any(Leave Empty If None)" value=""><?php echo $port; ?></textarea>
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

    <!--footer-->
    <div class="footer">
        <div class="container">
            <p>AbhikShil Copyright &copy; 2021-<?php $today=date("Y"); echo $today?>.</p>
        </div>
    </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>-->
<!--    <script type="text/javascript" src="jspdf.umd.min.js"></script>-->
    <script>
        function printDiv(divId,title) {

  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(divId).innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  mywindow.close();

  return true;
}
  
    </script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="resume.js"></script>
<!--    <script src="javascript.js"></script>-->
  </body>
</html>