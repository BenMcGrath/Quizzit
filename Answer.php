<?php
    session_start();
    //On this page will allow students to answer the question in a given quiz.
    //Content to the quiz
    $connect = mysql_connect("localhost", "webd_wt2user", "RD3%JgdAcI5!" ) or die("Couldn't connect");
    mysql_select_db("webd_wt2") or die ("Couldn't find Database");
    //The will be two different ways the student will be sent to this page
    //1. From the student code entry page
    //2. from answering a question.
    //Both will have to send the quiz code but both different way to help work it out
    //1. One will sent it by GET (code entry)
    //2. By the POST method (answering questions)
    //first checkdate the quiz code hash been sent by GET
    if (isset($_GET['quizcode']))
    {
        //The GET method sent this as a result need the first question
        //get quiz ID
        $quizID = $_GET['quizcode'];
        //First Get the Quiz info.

        $quizinfoquery= mysql_query("SELECT * FROM Quizzes WHERE ID = '$quizID'");
        if($quizinfoquery)
        {
            //the query worked now lets check the is a quiz with this ID
            if(mysql_num_rows($quizinfoquery) == 0)
            {
                //There no Quiz with this ID
                //Let get rid of them.
                header('Location: StudentcodeGUI.php');
            }
            else
            {
                //Right get the Quiz Information.
                $quizinfo = mysql_fetch_array($quizinfoquery);   
            }
            //Now we have the quiz info let get a question
            //As this is the first question we need the first question
            $questionID = $quizinfo['Q1_ID'];
            //now we have the ID need to Check there a code in there.
            if($questionID == "")
            {
                //No questions?
                //Bye Bye
                header('Location: StudentcodeGUI.php');
            }
            else
            {
                //Need to get the Question Information
                $Questquery = "SELECT * FROM Questions Where ID = '$questionID'";
                $Questarray = mysql_query($Questquery);
                    
                //$quesinfo = mysql_fetch_array($QuestInfo);
                //
                if($Questarray)
                {
                    $question = mysql_fetch_array($Questarray);
                    
                }
                else
                {
                    //It failed
                    echo $questionID;
                }                       
            }
            //Make the question Number ID set
            $ques_num = 1;
            //Run page
        }
    }
    else if(isset($_POST['quiz_id']))
    {
        //The POST method sent this as a result second question needed

        //OR if no questiosn left need to say good bye :)
        //First get quizid
        $quizID = $_POST['quiz_id'];
        //get the question id
        $questionID = $_POST['ques_code'];
        //Get the Question they are on.
        $ques_num = $_POST['ques_num'];

        //Now need to take the result and put it in the database
        $studentanswer = $_POST['Option'];
        //Query
        $addquestionquery = "INSERT INTO Student_Answers (Question_ID, Student_Answer) VALUES ('$questionID', '$studentanswer')";
        //Now add it to the database
        if (!mysql_query($addquestionquery))
        {
            die('Error: ' . mysql_error());
        }


        //Then increase it by one
        ++$ques_num;
        //Now lets run the same code and get the next question If no question END the quiz
        $quizinfoquery= mysql_query("SELECT * FROM Quizzes WHERE ID = '$quizID'");
        if($quizinfoquery)
        {
            //the query worked now lets check the is a quiz with this ID
            if(mysql_num_rows($quizinfoquery) == 0)
            {
                //There no Quiz with this ID
                //Let get rid of them.
                header('Location: StudentcodeGUI.php');
            }
            else
            {
                //Right get the Quiz Information.
                $quizinfo = mysql_fetch_array($quizinfoquery);   
            }
            //Now we have the quiz info let get a question
            //As this is the first question we need the first question
            $questionID = $quizinfo['Q'.$ques_num.'_ID'];
            //now we have the ID need to Check there a code in there.
            if($questionID == "")
            {
                //No questions?
                //Bye Bye
                //Need to add a question finsihed page?
                header('Location: StudentcodeGUI.php');
            }
            else
            {
                //Need to get the Question Information
                $Questquery = "SELECT * FROM Questions Where ID = '$questionID'";
                $Questarray = mysql_query($Questquery);
                    
                //$quesinfo = mysql_fetch_array($QuestInfo);
                //
                if($Questarray)
                {
                    $question = mysql_fetch_array($Questarray);
                    
                }
                else
                {
                    //It failed
                    echo $questionID;
                }                       
            }
        }
    }
    else
    {
        //Nothing been sent should not be here.
        header('Location: StudentcodeGUI.php');
    }
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
        <title>Home &middot; QuizzIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
        <![endif]-->

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <style>
            body {
                padding-top: 60px;
            }
        </style>
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="Default.php">QuizzIt</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="Default.php">Home</a></li>
                            <li><a href="About.php">About</a></li>
                            <li><a href="Contact.php">Contact</a></li>
                            <li><a href="Tutorial.php">Tutorial</a></li>
                            <li><a href="AdminLogin.php">Admin</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hero-unit">
                <h1>
                    Question - <?php echo $ques_num; ?>
                </h1>
                <p>Please answer the following question!</p>
                <?php
                    echo "<p>".$question['Question']."</p>";
                ?>
                <form method="post" onsubmit="validateForm(this);" class="form-register" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden"  id="quiz_id" name="quiz_id" value="<?php echo $quizID; ?>">
                    <input type="hidden"  id="ques_code" name="ques_code" value="<?php echo $questionID; ?>">
                    <input type="hidden"  id="ques_num" name="ques_num" value="<?php echo $ques_num; ?>">
                    <?php
                        //need to add the code that shows all the univertsy in the system
                        //do it by a list format
                        $optionnum = 1;
                        while($optionnum < 5)
                        {
                            $option = $question['Option' . $optionnum];
                            echo "<input type=\"radio\" name=\"Option\" value=\"" . $optionnum . "\">".$option."<br />";
                            //Now increment the answer
                            ++$optionnum;
                        }
                    ?>
                        

                    <br />
                    <button class="btn btn-large btn-primary" name="submit" id="submit" type="submit">Answer</button>
                </form>
            </div>
        </div>
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
        <script>
            $('.dropdown-toggle').dropdown()
        </script>
	</body>
</html>