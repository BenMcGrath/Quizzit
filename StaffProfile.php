<?php
session_start();

$username = $_SESSION['username'];

$connect = mysql_connect("localhost", "webd_wt2user", "RD3%JgdAcI5!" ) or die("Couldn't connect");
mysql_select_db("webd_wt2") or die ("Couldn't find Database");

$query = mysql_query("SELECT * FROM Tutors WHERE Tutor_ID='$username' ");

$universities =  mysql_query("SELECT * FROM Universities ORDER BY Name");

$numrows = mysql_num_rows($query);

$row = mysql_fetch_array($query);
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
          </button>
         
		 <a class="brand" href="Default.html">QuizzIt - 
				<?php 
					while( $row = mysql_fetch_array( $universities ) )
					{
						{echo $row['Name'];
					}
				?>
				
		  </a>
		  
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Profile</a></li>
              <li><a href="#">Modules</a></li>
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
        <h1>Welcome, 'STAFF NAME HERE?'</h1>
        <br>
        <h2>Where to go from here</h2>
        <p>Please use the links in the navigation bar to view the corresponding pages</p>
        <br>
        <h2>How to create a new quiz</h2>
        <p>To create a new quiz, you will need to go to the modules page, select a module, and then create a new quiz relating to that module</p>
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