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


        //Run page
    }
    else if(isset($_POST['quizcode']))
    {
        //The POST method sent this as a result second question needed
        //OR if no questiosn left need to say good bye :)

        //First get question info

        //Get the Question they are on.

        //If no questions left end quiz

        //If there is a question show question.


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
        <h1>Welcome to QuizzIt</h1>
        <br>
        <h2>Who are you?</h2>
        <p>Please select the button relevant to you below, staff or student.</p>
        <a href="LoginGUI.php" class="btn btn-large btn-primary">Staff</a>
        <a href="StudentcodeGUI.php" style="margin-left: 5px;" class="btn btn-large">Student</a>
        <br><br>
        <h2>Staff registration</h2>
        <p>If you are a 'first-time visiting' staff member, you will need to create an account on this system.</p>
        <a href="TutorRegister.php" class="btn btn-large btn-primary">Staff Registration</a>
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



