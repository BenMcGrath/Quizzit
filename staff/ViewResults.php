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
    $quesID = $_GET['qid'];
    $quesinfoquery= mysql_query("SELECT * FROM Student_Answers WHERE Question_ID = '$quesID'");
    if($quesinfoquery)
    {
        //the query worked now lets check the is a quiz with this ID
        if(mysql_num_rows($quesinfoquery) == 0)
        {
            echo $quesID;
            die("No Quiz with this ID");
        }
        else
        {
            //answser varibles
            $option1 = 0;
            $option2 = 0;
            $option3 = 0;
            $option4 = 0;
            //Now to find out how many results have been posted
            $num_answers = mysql_num_rows($quesinfoquery );

            while($ques = mysql_fetch_array( $quesinfoquery ))
            {
                switch ($ques['Student_Answer']) 
                {
                    case 1:
                        ++$option1;
                        break;
                    case 2:
                        ++$option2;
                        break;
                    case 3:
                        ++$option3;
                        break;
                    case 4:
                        ++$option4;
                        break;
                }

            }

        }
        //no need for an else as we just need to run the page now.
    }
    else
    {
        die("Query failed");
    }

    $Questquery = "SELECT * FROM Questions Where ID = '$quesID'";
    $Questarray = mysql_query($Questquery);
    if($Questarray)
    {

        $row = mysql_fetch_array($Questarray);
        //It worked
        //Now show the data of the question in the table.
        /*echo "<tr>";
        echo "<td>". $ques_num . "</td>\n";
        echo "<td>". $row['Question'] . "</td>\n";
        echo "<td>". $row['Option1'] . "</td>\n";
        echo "<td>". $row['Option2'] . "</td>\n";
        echo "<td>". $row['Option3'] . "</td>\n";
        echo "<td>". $row['Option4'] . "</td>\n";
        echo "<td>". $row['Answer'] . "</td>\n";
        echo "</tr>";*/
                        
    }
    else
    {
        die("Query failed");
    }

    

    //now to get the answers at of them.
    



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
        <h1>View Results - <?php echo $row['Question'];?>
        </h1>
        <table class="table">
            <tr>
                <th>Option</th>
                <th>Answers</th>
            </tr>
            <tr>
                <td><?php echo $row['Option1'];?></td>
                <td><?php echo $option1;?></td>
            </tr>
            <tr>
                <td><?php echo $row['Option2'];?></td>
                <td><?php echo $option2;?></td>
            </tr>
            <tr>
                <td><?php echo $row['Option3'];?></td>
                <td><?php echo $option3;?></td>
            </tr>
            <tr>
                <td><?php echo $row['Option4'];?></td>
                <td><?php echo $option4;?></td>
            </tr>
        </table>
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

