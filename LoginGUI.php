<?php
    session_start();

	//Check whether the session variable SESS_USER_ID is present or not
	if(isset($_SESSION['username']))
    {
		//They are already logged in
        header ('Location: StaffProfile.php');

	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Staff login &middot; QuizzIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
        <![endif]-->

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                max-width: 301px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }

            .form-signin .form-signin-heading, .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin input[type="text"], .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
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
          <a class="brand" href="Default.html">QuizzIt</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="Default.html">Home</a></li>
              <li><a href="About.html">About</a></li>
              <li><a href="Contact.html">Contact</a></li>
              <li><a href="tutorial.html">Tutorial</a></li>
              <li><a href="AdminLogin.html">Admin</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
        <div class="container">
          <form method="post" onsubmit="validateForm(this);" class="form-signin" action="LogIn.php">
            <h2 class="form-signin-heading">Staff login</h2>
            <input type="text" class="input-block-level required" required="required" rel="popover" id="username" name="username" data-content="Please enter your ID" placeholder="Tutor ID">
            <input type="password" class="input-block-level required" required="required" rel="popover" id="password" name="password" data-content="Please enter your password" placeholder="Password">
            <button class="btn btn-large btn-primary" type="submit">Sign in</button>
            <a href="Default.html" style="margin-left: 5px;" class="btn btn-large">Back to HomePage</a>
          </form>
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
