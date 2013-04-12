<?php
//In this file will Allow a certain Quiz to be editied and more questions added to it. 
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

if(isset($_GET['qid']))
{
    //They should be on this pages lets keep going.
    //we need to get all the information about this Quiz.
    //get the Quiz ID
    $quizID = $_GET['qid'];
    $quizinfoquery= mysql_query("SELECT * FROM Quizzes WHERE ID = '$quizID'");
    if($quizinfoquery)
    {
        //the query worked now lets check the is a quiz with this ID
        if(mysql_num_rows($quizinfoquery) == 0)
        {
            die("No Quiz with this ID");
        }
        else
        {
            $quizinfo = mysql_fetch_array($quizinfoquery);   
        }
        //no need for an else as we just need to run the page now.
    }
    else
    {
        die("Query failed");
    }


}
else
{
    //They shoudl not be on this page send them away!
    header ('Location: Quiz.php');
}


?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Quiz &middot; QuizzIt</title>
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
              <li><a href="Quiz.php">Quizzes</a></li>
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
        <h1>Edit Quiz - 
            <?php
                echo $quizinfo['Name'];
            ?>
        </h1>
        <p>
            Here you can edit the quiz and add questions.
        </p>
        <?php
            echo "<p>Quiz Name: " . $quizinfo['Name'] . "</p>\n";
            echo "<p>Module: " . $quizinfo['Module_ID'] . "</p>\n";
            //need to show questions already in the system or not. 
            //max of 15 questiosn but once hit the last one stop running. 

            //first need to have somethign to work out what the question we are on this is also need for the query.
            $ques_num = 1;

        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Q_Num
                    </th>
                    <th>
                        Question
                    </th>
                    <th>
                        Option 1
                    </th>
                    <th>
                        Option 2
                    </th>
                    <th>
                        Option 3
                    </th>
                    <th>
                        Option 4
                    </th>
                    <th>
                        Correct Option
                    </th>
                </tr>
            </thead>

          
             <?php

            //now the while loop as it is 15 question we want it to stop at at 15
            while($ques_num < 16)
            {
                //Need to make the Id for the query each time.
                $Q_ID = "Q" . $ques_num . "_ID";

                //now we have the ID need to Check there a code in there.
                if($quizinfo['$Q_ID'] == "")
                {
                    //there is no question from this point need to end. 
                    break;
                }
                else
                {

                    $ques_num++;
                }
              
            }
        ?>
        </table>
        <?php
            if($ques_num = 1)
            {
                echo "<p>This quiz has no questions..yet</p>";
            }

            //If there was not 15 questions give a link to add more.
            if($ques_num < 15)
            {
                //give them a link.
                //need to pass TWO varibles
                //1. The Quiz ID
                //2. The Question number it will be
                echo "<a href=\"AddQuestion.php?ques_num=" . $ques_num . "&Quiz_ID=" . $quizinfo['ID'] . "\">Add a question</a>";
            }
        ?>




      </div>
    </div>
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
    <script>
        $('.dropdown-toggle').dropdown()
    </script>
  </body>
</html>

