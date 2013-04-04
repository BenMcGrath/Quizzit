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


//Has the form been submitted?
if(isset($_POST['submit']))
{


    //now we have the data nopw need to think about putting it in the database
    //first check everything is filled in
    if( isset($_POST['quizName']) && isset($_POST['quizID']) && isset($_POST['tutID']) && isset($_POST['modID']))
    {
        $QuizName = $_POST['quizName'];
        $QuizID = $_POST['quizID'];
        $TutID = $_POST['tutID'];
        $ModuleID = $_POST['modID'];

        //Yes everything filled in now put it in the database
        $quizinsertquery = "INSERT INTO Quizzes (ID, Tutor_ID, Module_ID, Name, Live) VALUES ('$QuizID', '$TutID', '$ModuleID', '$QuizName', 'F' )";
        if (!mysql_query($quizinsertquery))
        {
            //Failed
                    echo $QuizID;
        echo $QuizName;
        echo $TutID;
            die('Error: ' . mysql_error());
        }
        else
        {
            //Worked
            //Now send them to the area to work on the quiz and add questions. 
            header ('Location: Quiz.php');
        }
    }
    else
    {
        echo $QuizID;
        echo $QuizName;
        echo $TutID;
        echo "Error Something gone wrong";
    }

}
else
{
    //As this pages will make a page we need to get the module ID that was sent over in the link
    if(isset($_GET['mid']))
    {
        //Yes it is set save it in a Varible
        $ModuleID = $_GET['mid'];
    }
    else
    {
        //Nope an ID has not been Set as a result sent them back to the module page. 
        header ('Location: Modules.php');
    }

    //As this pages will make a page we need to get the module ID that was sent over in the link
    if(isset($_GET['mid']))
    {
        //Yes it is set save it in a Varible
        $ModuleID = $_GET['mid'];

        //Now we need to get the data from that module.
        $moduleinfoquery = mysql_query("SELECT * FROM Modules WHERE ID = '$ModuleID' ");							
        if($moduleinfoquery)
        {
            //Get all the Info for that module
            $moduleinfo = mysql_fetch_array($moduleinfoquery);


                //Make a unique number for Quiz ID
                //Make a Unique code for the modules
                $uniquecode = uniqid(Quiz);
                //$uniquecode = "test";

                //As a precuastion check the code is not already in use. 
                $codeCheck = mysql_query("SELECT * FROM Quizzes WHERE ID = '$uniquecode' ");
                $codenumrows = mysql_num_rows($codeCheck);

                if ($codenumrows <= 1 )
                {
                    //Correct end while loop
                    $codetrue = TRUE;
                }
                else
                {
                    echo $codenumrows;
                    echo "Failed";                    
                }
        }
        else
        {
	        die('Error: ' . mysql_error());
        }
    }
    else
    {
        //Nope an ID has not been Set as a result sent them back to the module page. 
        header ('Location: Modules.php');
    }
}


?>

<!DOCTYPE html>

<html>
  <head>
    <title>Make a Quiz &middot; QuizzIt</title>
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
        <h1>
            Make a Quiz - 
            <?php
                echo $moduleinfo['Name'];
            ?>
        </h1>
        <p>
            Here we are going to make a quiz for - 
            <?php
                echo $moduleinfo['Name'];
            ?>
            First we need you to give your quiz a name.
        </p>
        <p>
        <?php
            echo $uniquecode;
            echo $username;
        ?>
        </p>
        <!--Form to go here. -->
        <form method="post" onsubmit="validateForm(this);" class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" class="input-block-level required" required="required" rel="popover" id="quizName" name="quizName" data-content="Please enter The Name" placeholder="Quiz Name">
            <input type="hidden"  id="quizID" name="quizID" value="<?php echo $uniquecode; ?>">
            <input type="hidden"  id="tutID" name="tutID" value="<?php echo $username; ?>">
            <input type="hidden"  id="modID" name="modID" value="<?php echo $ModuleID; ?>">
            <button class="btn btn-large btn-primary" type="submit" name="submit" id="submit">Make Quiz</button>
        </form>


      </div>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
  </body>
</html>