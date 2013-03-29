<?php
session_start();
//Need to get the Session ID 
if (!isset($_SESSION['username']))
{
    header ('Location: ../LoginGUI.php');
}
$username = $_SESSION['username'];

//Connect to the Database
$connect = mysql_connect("localhost", "webd_wt2user", "RD3%JgdAcI5!" ) or die("Couldn't connect");
mysql_select_db("webd_wt2") or die ("Couldn't find Database");

//Get The tutors details
$query = mysql_query("SELECT * FROM Tutors WHERE Tutor_ID='$username' ");
$tutDetails = mysql_fetch_array($query);
//Get the Universtiy They are at

//First get the ID in their account
$tutUniID = $tutDetails['Universities'];

//Now get the Name of that UNI
$uniNameQuery =  mysql_query("SELECT * FROM Universities WHERE ID = '$tutUniID'");
$uniName = mysql_fetch_array($uniNameQuery);

?>

<!DOCTYPE html>

<html>
  <head>
    <title>Staff Profile &middot; QuizzIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>
  
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
		 <a class="brand" href="StaffProfile.php">QuizzIt - 
				<?php 
					echo $uniName['Name'];
				?>
		  </a>
		  
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="StaffProfile.php">Profile</a></li>
              <li><a href="Modules.php">Modules</a></li>
              <li><a href="#">Results</a></li>
              <li><a href="#">Notes</a></li>
              <li><a href="#">Trending</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="hero-unit">
        <h1>Modules
        </h1>
        <p>Hello here you can add modules you teach at your Universtiy</p>
        <a href="addmodule.php" class="btn btn-large btn-primary">Add a Module</a>
        <h2>Your Modules</h2>
        <?php
            //show Modules this tutor teaches

            //Get the tutor username 
            $tutorID = $username;

            //Now get the Modules
            $modulesquery =  mysql_query("SELECT * FROM Tutor_Modules WHERE Tutor_ID = '$tutorID'");
            //$Modules = mysql_fetch_array($modulesquery);


				if($modulesquery) {
					if(mysql_num_rows($modulesquery) == 0) {
						echo "<p>You dont have Modules.</p>";
					}else {
						//The user does not have an entry for this ride.
						while( $myArray = mysql_fetch_array( $modulesquery ) )
						{
								$moduleID = $myArray['Module_ID'];
								$moduleinfoquery = mysql_query("SELECT * FROM Modules WHERE ID = '$moduleID' ");							
								if($moduleinfoquery)
								{
									$row = mysql_fetch_array($moduleinfoquery);
								}
								else
								{
									die('Error: ' . mysql_error());
								}

                                echo "Module Name: " . $row['Name'] . "<br />";
                                /*
							echo "<div class=\"messagebox\">" 
								."<div class=\"messageusername\"> " . $row['firstname'] . " " . $row['lastname'] .  "</div>"
								."<div class=\"messagesubject\">Subject: <u>"
								.$myArray['subject'].  "</u></div>"

								."<div class=\"messagedate\"> " . $myArray['date'] . "</div>"	
								."<div class=\"clear\"></div>"
								."<div class=\"messagecontent\"> <div class=\"uparrowdiv\"> " . $myArray['message'] 
								."</div> </div>  </div>" 
								;*/
						}
					}
				}else {
					die("Query failed");
				}

        ?>



      </div>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
  </body>
</html>