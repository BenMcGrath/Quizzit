<?php
session_start();
$username = $_SESSION['username'];
$connect = mysql_connect("localhost", "webd_wt2user", "RD3%JgdAcI5!" ) or die("Couldn't connect");
mysql_select_db("webd_wt2") or die ("Couldn't find Database");
$query = mysql_query("SELECT * FROM Tutors WHERE Tutor_ID='$username' ");
$tutDetails = mysql_fetch_array($query);
$tutUniID = $tutDetails['Universities'];
$uniNameQuery =  mysql_query("SELECT * FROM Universities WHERE ID = '$tutUniID'");
$uniName = mysql_fetch_array($uniNameQuery);
?>
<!DOCTYPE html>
<?php
if (isset($_SESSION['username']))
	{
	?>
	<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>About &middot; QuizzIt</title>
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
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
		 <a class="brand" href="Default.php">QuizzIt - 
				<?php 
					echo $uniName['Name'];
				?>
		  </a>
		  
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="Default.php">Home</a></li>
              <li><a href="About.php">About</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li class="active"><a href="tutorial.php">Tutorial</a></li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username; ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                <li><a href="http://webdesign.lincoln.ac.uk/wt2/testroom/staff/StaffProfile.php">Profile</a></li>
                </ul>
				</li>
              <li><a href="Logout.php">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="hero-unit">
        <h1>Tutorials</h1>
        <br>
        
        <p>Below will show you the easy steps you can follow to creating or taking part in quizzes. </p>
        <br>
        <h2>Step 1 - Choosing your Identity</h2>
        <p>Make sure you are on the homepage. Where it says 'who are you?', be sure to click whether you are a student or lecturer. If you're a lecturer
		haven't already made an account, you'll need to register first.</p>
		<img src="tut1.png">
		<br>
		<br>
		
		<h2>Step 2 - Log in</h2>
		
		<p>You'll need to log in before you can go any further. Simply enter your student code number or staff login details to continue.</p>
		<img src="tut2.png">
		<br><br><br>
		
		<h2>Step 3 - Do the quiz!</h2>
		<p>Do the quiz and then click submit when you are finished! Thats it!</p>
		
		
		
		
		
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
<?php

}
else
{
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>About &middot; QuizzIt</title>
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
              <li><a href="Default.php">Home</a></li>
              <li><a href="About.php">About</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li class="active"><a href="tutorial.php">Tutorial</a></li>
              <li><a href="AdminLogin.php">Admin</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="hero-unit">
        <h1>Tutorials</h1>
        <br>
        
        <p>Below will show you the easy steps you can follow to creating or taking part in quizzes. </p>
        <br>
        <h2>Step 1 - Choosing your Identity</h2>
        <p>Make sure you are on the homepage. Where it says 'who are you?', be sure to click whether you are a student or lecturer. If you're a lecturer
		haven't already made an account, you'll need to register first.</p>
		<img src="tut1.png">
		<br>
		<br>
		
		<h2>Step 2 - Log in</h2>
		
		<p>You'll need to log in before you can go any further. Simply enter your student code number or staff login details to continue.</p>
		<img src="tut2.png">
		<br><br><br>
		
		<h2>Step 3 - Do the quiz!</h2>
		<p>Do the quiz and then click submit when you are finished! Thats it!</p>
		
		
		
		
		
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
<?php
}
?>