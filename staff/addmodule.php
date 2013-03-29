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

//Check for add module 
if (isset($_POST['submit']))
{
    //The user has sent the add module need to add it to the database.

    //Get all the information need

    //Tutor ID
    $tutorID = $username;
    //Module Name
    $modName = $_POST['modName'];
    //uni ID
    $uniID = $_POST['Uni_ID'];
    //Module Password
    $modPassword = $_POST['modPass'];

    //Now Check they are all filled in

    if ( isset($modName) && isset($uniID) && isset($modPassword) )
    {
        //Yes everything filled in so now need to add it to the database. 

    }
}

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
        <a href="LoginGUI.html" class="btn btn-large btn-primary">Add a Module</a>
        <h2>Add Module</h2>
        <p>Please use the form below to add a module</p>
        <form method="post" onsubmit="validateForm(this);" class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" class="input-block-level required" required="required" rel="popover" id="modName" name="modName" data-content="Please enter The Module Name" placeholder="Module Name">
            <select name="Uni_ID">
            <?php
                //need to add the code that shows all the univertsy in the system
                //do it by a list format
                //connect to the database.
                


                $universities = mysql_query("SELECT * FROM Universities ORDER BY Name");
                    
                while( $myArray = mysql_fetch_array( $universities ) )
                {
                    echo "<option value=\"". $myArray['ID'] . "\">" . $myArray['Name'] . "</option> \r\n"  ;
                }
                //<input type="text" class="input-block-level required" name="university" id="university" required="required" rel"popover" data-content="Please enter your university" placeholder="University">

            ?>
            </select>
            <input type="password" class="input-block-level required" required="required" rel="popover" id="modPass" name="modPass" data-content="Please enter your password" placeholder="Password">
            <button class="btn btn-large btn-primary" type="submit" name="submit" id="submit">Make Module</button>
        </form>
        



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