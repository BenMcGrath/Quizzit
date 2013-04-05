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
              <li class="active"><a href="About.php">About</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><a href="tutorial.php">Tutorial</a></li>
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
        <h1>About</h1>
        <br>
        <h2>What is QuizzIt?</h2>
        <p>It is a quiz system used by lecturers to test student's overall understanding of a particular subject.
        Students anonymously take a quiz set by a lecturer and then the results are displayed to the class.</p>
        <br>
        <h2>Why has it been developed?</h2>
        <p>It is hard for lecturers to know if students in their classes understand the subject being taught. It is
        important for students to understand subjects in order to do well in assessments/exams, it is hoped that the
        QuizzIt system will help reinforce student's understanding of different subjects.</p>
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
	<html>
	<head>
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
              <li><a href="Default.php">Home</a></li>
              <li class="active"><a href="About.php">About</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><a href="tutorial.php">Tutorial</a></li>
              <li><a href="AdminLogin.php">Admin</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="hero-unit">
        <h1>About</h1>
        <br>
        <h2>What is QuizzIt?</h2>
        <p>It is a quiz system used by lecturers to test student's overall understanding of a particular subject.
        Students anonymously take a quiz set by a lecturer and then the results are displayed to the class.</p>
        <br>
        <h2>Why has it been developed?</h2>
        <p>It is hard for lecturers to know if students in their classes understand the subject being taught. It is
        important for students to understand subjects in order to do well in assessments/exams, it is hoped that the
        QuizzIt system will help reinforce student's understanding of different subjects.</p>
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