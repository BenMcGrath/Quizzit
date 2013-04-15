<?php
//In this file will allow questiosn to be added.
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

if(isset($_POST['submit']))
{
    //This means the form has been filled in

    //First lets make a Quesion ID number
    $codetrue = FALSE;
    $i = 1;

    while($codetrue != TRUE)
    {
        //Make a Unique code for the modules
        $uniquecode = uniqid(mod);

        //As a precuastion check the code is not already in use. 
        $codeCheck = mysql_query("SELECT * FROM Questions WHERE ID='".$uniquecode."' ");
        $codenumrows = mysql_num_rows($codeCheck);
        $i = $i++;

        if ($codenumrows > 0)
        {
            //Not Correct re run the while
        }
        else
        {
            //Correct end while loop
            $codetrue = TRUE;
            echo $i;
        }

        if($n > 10)
        {
            echo "Something gone wrong!";
            $codeCheck = TRUE;

        }
    } 
    //Now we have a ID number Lets put this into the database

    //first lets get all the Vairbles that would have been sent.

    //question num
    $_POST[''] = $argc;
    //Quiz Id
    $_POST[''] = $argc;
    //Question
    $_POST[''] = $argc;
    //option1
    $_POST[''] = $argc;
    //option2
    $_POST[''] = $argc;
    //option3
    $_POST[''] = $argc;
    //option4
    $_POST[''] = $argc;
    //corectoption
    $_POST[''] = $argc;

}
else
{
    //need to check the two varibles have been set.
    if(isset($_GET['Quiz_ID']) && isset($_GET['ques_num']))
    {
        //Yes they are set so save them as we will need them when submitting to the database.
        //Quiz ID
        $Quiz_ID = $_GET['Quiz_ID'];

        //Question Number
        $Ques_num = $_GET['ques_num'];

    }
    else
    {
        //They shoudl not be on this page send them away!
        header ('Location: Quiz.php');

    }
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
        <h1>Add Question
        </h1>
        <?php
            echo "<p>This will be Question Number " . $Ques_num . "</p>";

        ?>
        <form method="post" onsubmit="validateForm(this);" class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden"  id="ques_num" name="ques_num" value="<?php echo $Ques_num; ?>">
            <input type="hidden"  id="quiz_id" name="quiz_id" value="<?php echo $Quiz_ID; ?>">
            <input type="text" class="input-block-level required" required="required" rel="popover" id="Question" name="Question" data-content="Please enter The Name" placeholder="Question">
            <input type="text" class="input-block-level required" required="required" rel="popover" id="Option1" name="Option1" data-content="Please enter The Name" placeholder="Option 1">
            <input type="text" class="input-block-level required" required="required" rel="popover" id="Option2" name="Option2" data-content="Please enter The Name" placeholder="Option 2">
            <input type="text" class="input-block-level required" required="required" rel="popover" id="Option3" name="Option3" data-content="Please enter The Name" placeholder="Option 3">
            <input type="text" class="input-block-level required" required="required" rel="popover" id="Option4" name="Option4" data-content="Please enter The Name" placeholder="Option 4">
            <select name="correctanswer">
                <option selected value="">Correct Answer</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
            </select>
            <br/>
            <button class="btn btn-large btn-primary" type="submit" name="submit" id="submit">Make Quiz</button>
        </form>




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

